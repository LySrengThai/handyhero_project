<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company_detail extends Model
{
    public $table = 'company_detail';
    public $primaryKey = 'company_id';
    public $incrementing = true;
    public $timestamps = false;

}
