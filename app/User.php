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
<<<<<<< HEAD
    protected $fillable = [
        'name', 'email', 'password',
    ];

=======

    protected $table='usr_logins';
    protected $fillable = ['id','mail','token','passwd','activate_account','active','register_date','modify_by','modify_date','created_at','updated_at'];
    protected $guarded=['id'];
>>>>>>> 57353bb5881c95218114689c6ac52f9a82406438
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
<<<<<<< HEAD
    protected $hidden = [
        'password', 'remember_token',
    ];
=======
   
>>>>>>> 57353bb5881c95218114689c6ac52f9a82406438
}
