<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_table extends Model
{
    use HasFactory;
    protected $table = 'user_detail';
    protected $primaryKey = 'user_id';

    // public $table = 'user_detail';
    // public $primiaryKey = 'user_id';
    // public $incrementing = true;
    // public $timestamps = false;
}
