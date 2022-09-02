<?php

namespace App\Http\Controllers\covidInfo;

use App\Http\Controllers\Controller;
use App\Models\CovidHistory;
use App\Service\BigFunctions;
use Carbon\Carbon;
use Illuminate\Http\Request;

class covidInfo extends Controller
{
    public function index(Request $request){

        $path = $this-> getPath($request);

        //api 받아오는 부분
        $key = 'jPabJtf8zIFvgs6pR7TqV9UEQ4xyZHlDc';

        if (!empty($key)) {
            $existKey = true;
        } else {
            $existKey = false;
        }

        if ($existKey) {
            $data = @file_get_contents('https://api.corona-19.kr/korea/beta/?serviceKey='. $key);
            $json = json_decode($data, true);
        }

        // 지역 구분
        $area = 'seoul';
        if($request->get('area') != null){
            $area = $request->get('area');
        }

        //api 날짜 시간 구하기
        //현재시간
        $dt = Carbon::now()->timezone('Asia/Seoul');

        //api 기준시간
        $rough = mb_substr($json['API']['updateTime'],23, 9, 'utf8');
        $apiMonth = mb_substr($rough, 0,2,'utf8');
        $apiDay = mb_substr($rough, 3,2,'utf8');
        $nowYear = $dt->format('Y');

        $apiDate = $nowYear.'-'.$apiMonth.'-'.$apiDay.' 00:00:00';
        $apiDateDatetime = date_create_from_format('Y-m-d H:i:s', $apiDate);

        $resFirst = CovidHistory::latest()->get()->first();
        $resBefore = $resFirst;
        //api 기준시간을 이용해 이미 저장이 되어 있다면 하나 이전의 데이터를 가져온다.
        if ($resFirst->counting_date == $apiDateDatetime->format('Y-m-d H:i:s')) {
            $resSecond = CovidHistory::latest()->skip(1)->take(1)->get();
            $resBefore = $resSecond[0];
        }

        // 연관 배열로 만들어 준다.
        $jsonBefore = (new BigFunctions)->changeInfoToJson($resBefore);


        return view('covidInfo.covidInfo', [
            'path' => $path,
            'json' => $json,
            'jsonBefore' => $jsonBefore,
            'area' => $area,
        ]);
    }

    public function officialIndex (Request $request){

        $path = $this-> getPath($request);

        /* PHP 샘플 코드 */

        $ch = curl_init();
        $url = 'http://openapi.data.go.kr/openapi/service/rest/Covid19/getCovid19InfStateJson'; /*URL*/

        $queryParams = '?' . urlencode('serviceKey') . '=rEKbeM4B%2Fg4XCmKRlsnXn23QmHz3FwQSo3gHz3fqMB%2Fx%2BDRPbmlOecJWoWTR7hzn%2FG6VWk%2BfOCX7Hl7pFyQ1Zw%3D%3D'; /*Service Key*/
        $queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
        $queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('10'); /**/
        $queryParams .= '&' . urlencode('startCreateDt') . '=' . urlencode('20200310'); /**/
        $queryParams .= '&' . urlencode('endCreateDt') . '=' . urlencode('20200315'); /**/

        curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        $response = curl_exec($ch);
        curl_close($ch);

        var_dump($response);

        return view('covidInfo.officialInfo',[
            'path' => $path,
        ]);
    }
}
