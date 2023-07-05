<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = "booking_detail";
    public function user(){
        return $this->belongsTo(user_detail::class,'user_id');
    }
    public function service(){
        return $this->belongsTo(ServiceDetail::class,'service_id');
    }
}
