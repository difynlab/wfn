<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'creator',
        'subject',
        'initial_message',
        'date',
        'time',
        'category',
        'warehouse',
        'admin_favorite',
        'user_favorite',
        'admin_view',
        'user_view',
        'user_status',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
