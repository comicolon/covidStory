<?php

namespace App\Http\Controllers\board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class lifeStoryBoardController extends Controller
{
    public function index(Request $request){
        $path = $this-> getPath($request);
//        $lifeStory = lifeStoryBoard::latest()->get();

        return view('boards.lifeStory.lifeStoryBoard',[
            'path' => $path,
//            'lifeStory' => $lifeStory,
        ]);
    }
}
