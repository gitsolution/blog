<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usr_role extends Model
{
    protected  $table='usr_roles';

    protected $fillable=['title','description','active','created_at'];

    protected $guarded=['id'];

}
