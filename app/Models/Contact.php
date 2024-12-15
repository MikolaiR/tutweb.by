<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'service_id',
        'status',
        'ip_address',
        'user_agent'
    ];

    protected $casts = [
        'service_id' => 'integer'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
