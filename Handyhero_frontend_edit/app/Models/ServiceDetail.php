<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    use HasFactory;
    public $primaryKey = 'service_id';
    protected $table = "service_detail";
    public function cat(){
        return $this->belongsTo(Cat::class,'cate_id');
    }
    public function comp(){
        return $this->belongsTo(company_detail::class,'company_id');
    }
}
