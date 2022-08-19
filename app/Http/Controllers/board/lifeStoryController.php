<?php

namespace App\Http\Controllers\board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class lifeStoryController extends Controller
{
    public function index(Request $request){

        $path = $this-> getPath($request);

        return view('boards.lifeStory.lifeStoryIndex', [
            'path' => $path
        ]);
    }
}
