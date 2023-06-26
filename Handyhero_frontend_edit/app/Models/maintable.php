<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maintable extends Model
{
    use HasFactory;
    protected $table = 'user_detail';
    protected $primaryKey = 'user_id';
    protected $fillable = [];
}
