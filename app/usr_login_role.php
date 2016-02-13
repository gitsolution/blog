<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usr_login_role extends Model
{
    protected  $table='usr_login_roles';

    protected $fillable=['id_login','id_role','active'];

    protected $guarded=['id_login'];
}
