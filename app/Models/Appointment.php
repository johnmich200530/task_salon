<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
       protected $fillable= [
    'customer_name',
    'contact',
    'date',
    'time',
    'service_id'
    ];

    public function service()
    {
        return $this ->belongsTo(Service::class);
    }

       public function payment()
    {
        return $this->hasOne(Payment::class);
    }

}