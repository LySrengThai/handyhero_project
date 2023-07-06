<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_table extends Model
{
    use HasFactory;
    protected $table = 'service_detail';
    protected $primaryKey = 'service_id';

}
