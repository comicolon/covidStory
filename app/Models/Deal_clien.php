<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal_clien extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'category',
        'writer',
        'num',
        'write_datetime',
        'views_on_local',
        'is_new',
        'is_closed',
        'is_changed'
    ];
}
