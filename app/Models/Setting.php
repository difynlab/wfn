<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'footer_logo',
        'favicon',
        'guest_image',
        'no_image',
        'no_profile_image',
        'fb_en',
        'instagram_en',
        'fb_ar',
        'instagram_ar',
    ];
}
