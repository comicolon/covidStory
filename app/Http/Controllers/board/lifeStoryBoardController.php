<?php

namespace App\Http\Controllers\board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class lifeStoryBoardController extends Controller
{

    public function index(Request $request)
    {
        $path = $this-> getPath($request);
//        $lifeStory = lifeStoryBoard::latest()->get();

        return view('boards.lifeStory.lifeStoryBoard',[
            'path' => $path,
//            'lifeStory' => $lifeStory,
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
