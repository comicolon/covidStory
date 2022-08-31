<?php

namespace App\Http\Controllers\covidInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class covidInfo extends Controller
{
    public function index(Request $request){

        $path = $this-> getPath($request);

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

        $area = 'seoul';
        if($request->get('area') != null){
            $area = $request->get('area');
        }

        return view('covidInfo.covidInfo', [
            'path' => $path,
            'json' => $json,
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
