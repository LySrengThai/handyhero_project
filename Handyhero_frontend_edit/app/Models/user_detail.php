<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_detail extends Model
{
    public $table = 'user_detail';
    public $primaryKey = 'user_id';
    public $incrementing = true;
    public $timestamps = false;

}
