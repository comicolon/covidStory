<?php

namespace App\Http\Controllers\extra;

use App\Http\Controllers\Controller;
use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store (){
        $comment = new comment();
        $comment->u_id = auth()->id();
        $comment->post_id = request('post_id');
        $comment->parent_id = 0;
        $comment->nickname = request('nickname');
        $comment->content = request('content');
        $comment->save();

        return back();
    }

    public function destroy(comment $comment){

        $comment->delete();

        return back();
    }
}