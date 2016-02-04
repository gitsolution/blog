<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usr_login extends Model
{
    //
    protected $table='usr_logins';
    protected $fillable = ['mail','token','passwd','activate_account','active','register_date','modify_by','modify_date','created_at','updated_at'];
    protected $guarded=['id'];
}
