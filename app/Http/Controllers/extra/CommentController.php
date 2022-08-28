<?php

namespace App\Http\Controllers\extra;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\LifeStoryBoard;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store (Request $request){

        $validation = $request -> validate([
            'content' => 'required',
        ]);


        $comment = new comment();
        $comment->u_id = auth()->id();
        $comment->post_id = request('post_id');
        $comment->parent_id = 0;
        $comment->nickname = request('nickname');
        $comment->content = $validation['content'];
        $comment->board_name = request('board_name');

        $comment->save();

        if ($comment->board_name == 'lifeStory'){
            $res = LifeStoryBoard::where('id', $comment->post_id)->first();
            $res->comment_count++;
            $res->save();
        }

        return back();
    }

    public function destroy(comment $comment){

        if($comment->board_name == 'lifeStory'){
            $res = LifeStoryBoard::where('id', $comment->post_id)->first();
            $res->comment_count--;
            $res->save();
        }

        $comment->delete();

        return back();
    }
}
