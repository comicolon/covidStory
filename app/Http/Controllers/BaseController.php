<?php

namespace App\Http\Controllers;

use App\Models\covidNews;
use App\Models\LifeStoryBoard;
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

        $area = 'seoul';
        if($request->get('area') != null){
            $area = $request->get('area');
        }


        // 뉴스 게시판 가져오기
        $covidNews = covidNews::latest()->take(5)->get();

        // 일상 게시판 가져오기
        $lifeStory = LifeStoryBoard::latest()->take(5)->get();

        return view('index', [
            'path' => $path,
            'json' => $json,
            'area' => $area,
            'covidNews' => $covidNews,
            'lifeStory' => $lifeStory,
        ]);
    }
}
