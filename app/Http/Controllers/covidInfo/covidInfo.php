<?php

namespace App\Http\Controllers\covidInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class covidInfo extends Controller
{
    public function index(Request $request){
        
        $path = $this-> getPath($request);

        return view('covidInfo.covidInfo', [
            'path' => $path
        ]);
    }
}
