<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class user_detail extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use HasApiTokens;
    public $table = 'user_detail';
    public $primaryKey = 'user_id';
    public $incrementing = true;
    public $timestamps = false;
    public $fillable=[
        "user_lname",
        "user_fname",
        "user_email",
        "user_password",
        "user_gender",
        "user_number",
        "user_address"
    ];

}
