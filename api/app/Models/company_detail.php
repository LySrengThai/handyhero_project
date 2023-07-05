<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class company_detail extends Model implements Authenticatable
{
    use HasApiTokens;
    use \Illuminate\Auth\Authenticatable;
    
    public $table = 'company_detail';
    public $primaryKey = 'company_id';
    public $incrementing = true;
    public $timestamps = false;

}
