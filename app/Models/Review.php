<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'image',
        'content',
        'star',
        'language',
        'status',
    ];
}
