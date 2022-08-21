<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LifeStoryBoard extends Model
{
    use HasFactory;

    protected $fillable = [
        'u_id',
        'title',
        'content',
        'canComment',
        'like',
        'dislike',
        'isBest',
        'is_published',
        'is_deleted',
        'gubun',
        'views',
        'nickname',
        'board_name',
        'comment_count'

    ];

    //db 관계 설정
    protected $guarded = [];
        // 사용자는 포스트를 쓰고 포스트는 사용자에 속한다.
    public function user(){
//        return $this->belongsTo(User::class);
        return $this->belongsTo('App\Models\User','u_id');
    }

    public  function comment(){
//        return $this->hasMany(comment::class);
        return $this->hasMany('App\Models\comment','post_id');
    }

}
