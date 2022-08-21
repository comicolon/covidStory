<?php

namespace App\Models;

use App\Http\Controllers\board\lifeStoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'u_id',
        'nickname',
        'post_id',
        'parent_id',
        'content',
        'is_published',
        'is_deleted',

    ];

    protected $guarded = [];

    //댓글은 많은 글에 달린다.
    public function Board(){
//        return $this->belongsToMany(lifeStoryBoard::class);
        return $this->belongsToMany('App\Models\LifeStoryBoard','post_id');
    }

    // 댓글은 사용자가 쓴다
    public function user(){
        return$this->belongsTo('App\Models\User','u_id','id');
    }
}
