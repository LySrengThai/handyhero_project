<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book_table extends Model
{
    use HasFactory;
    protected $table = 'booking_detail';
    protected $primaryKey = 'book_id';

}
