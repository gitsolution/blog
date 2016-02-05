<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cms_type extends Model
{
    protected $table='cms_types';
    protected $fillable = ['title','description','active','register_by','register_date','modify_by','modify_date'];
    protected $guarded = ['id'];
   

}
