<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class covidNews extends Model
{
    use HasFactory;

    protected $fillable = ['title',
                            'content',
                            'source',
                            'u_id',
                            'u_nickname',
                            'image_name',
                            'image_path',
                            'views',
                            'comment_count',
                            'board_name'
    ];
}
