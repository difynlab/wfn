<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageReply extends Model
{
    protected $fillable = [
        'replier',
        'message',
        'date',
        'time',
        'admin_view',
        'user_view',
        'status',
        'message_id',
    ];
}
