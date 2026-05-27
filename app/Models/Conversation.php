<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'phone',
        'email',
        'ai_conversation_id',
        'city',
        'tenancy_date',
        'renewal_date',
        'status',
        'user_id',
        'storage_type_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function storageType()
    {
        return $this->belongsTo(StorageType::class);
    }
}
