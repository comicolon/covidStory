<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index(Request $request){
        
        $path = $this-> getPath($request);

        return view('index', [
            'path' => $path
        ]);
    }
}
