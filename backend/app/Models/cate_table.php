<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cate_table extends Model
{
    use HasFactory;
    protected $table = 'service_cate';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;
}
