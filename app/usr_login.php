<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usr_login extends Model
{
    //
    protected $table='usr_logins';

    protected $fillable=['1','passwd','token'];
    protected $hidden=['passwd'];
}
