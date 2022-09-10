<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Best_inven extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'title',
        'url',
        'writer',
        'write_datetime',
        'views',
        'comment_count',
        'num',
        'views_on_local',
        'is_week_best',
        'is_month_best',
        'comments',
        't_score',
    ];
}
