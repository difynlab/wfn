<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'address',
        'cr_number',
        'email',
        'phone_code',
        'phone',
        'website',
        'industry',
        'company_size',
        'establishment_date',
        'registration_certificates',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
