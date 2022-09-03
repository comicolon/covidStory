<?php

namespace App\Http\Controllers;

use App\Http\Controllers\covidInfo\covidInfo;
use App\Models\covidNews;
use App\Models\LifeStoryBoard;
use App\Service\BigFunctions;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index(Request $request){

        $path = $this-> getPath($request);

        // 코로나 에피아이 가져오는 부분
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

        //지역구분
        $area = 'seoul';
        if($request->get('area') != null){
            $area = $request->get('area');
        }

        //이전 데이터를 가져온다.
        $resBefore = (new covidInfo)->getBeforeRes($json);

        // 연관 배열로 만들어 준다.
        $jsonBefore = (new BigFunctions)->changeInfoToJson($resBefore);

        //현재와 비교하여 차이를 계산함
        $diffincDec = $json['korea']['incDec'] - $jsonBefore['korea']['incDec'];        // 전체 확진자 차이


        // 뉴스 게시판 가져오기
        $covidNews = covidNews::latest()->take(5)->get();

        // 일상 게시판 가져오기
        $lifeStory = LifeStoryBoard::latest()->take(5)->get();

        return view('index', [
            'path' => $path,
            'json' => $json,
            'area' => $area,
            'diffinDec' => $diffincDec,
            'covidNews' => $covidNews,
            'lifeStory' => $lifeStory,
        ]);
    }
}
