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

    ];
}
