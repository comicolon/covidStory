<?php

namespace App\Http\Controllers\extra;

use App\Http\Controllers\Controller;

class weather extends Controller
{
    public function index(){

        return view('service.weather');
    }

    public function getWeather(){




    }
}
