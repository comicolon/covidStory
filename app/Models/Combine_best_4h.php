<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combine_best_4h extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating',
        'title',
        'url',
        'writer',
        'write_datetime',
        'views',
        'comment_count',
        'num',
        'comments',
        't_score',
    ];
}
