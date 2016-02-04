<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table='usr_logins';
    protected $fillable = ['id','mail','token','passwd','activate_account','active','register_date','modify_by','modify_date','created_at','updated_at'];
    protected $guarded=['id'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   
}
