<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'status',
        'service_id',
        'appointment_id'
    ];

 protected $casts = [
        'status' => 'string',
    ];
    
    public function service()
    {
    return $this ->belongsTo(Service::class);
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}