<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combine_hotdeal extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'title',
        'url',
        'category',
        'writer',
        'num',
    ];



}
