<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usr_login extends Model
{
    //
<<<<<<< HEAD
=======
    protected $table='usr_logins';
    protected $fillable = ['mail','token','passwd','activate_account','active','register_date','modify_by','modify_date','created_at','updated_at'];
    protected $guarded=['id'];
>>>>>>> 57353bb5881c95218114689c6ac52f9a82406438
}
