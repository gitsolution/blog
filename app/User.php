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
    protected  $table='users';

    protected $fillable=['email','password','active','remember_token ','register_by','modify_by'];

    protected $guarded=['id'];

    public function setPasswordAtriibute($valor)
    {
    	if(!empty($valor))
    	{
    		$this->attributes['password']=\Hash::make($valor);
    	}
    }
}
