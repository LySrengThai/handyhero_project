<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_table extends Model
{
    use HasFactory;
    protected $table = 'admin_detail';
    protected $primaryKey = 'admin_id';
    public $timestamps = true;
}
