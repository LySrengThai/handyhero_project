<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receipt_table extends Model
{
    use HasFactory;
    protected $table = 'receipt_detail';
    protected $primaryKey = 'receipt_id';

}
