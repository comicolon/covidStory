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

            'json' => $json,
            'area' => $area,
        ]);
    }
}
