<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cms_section extends Model
{
        protected $table='cms_sections';
        protected $fillable=['id_type','title','resumen','content','main_picture','private','publish_date','publish','uri','order_by','active','register_by','register_date','modify_by','modify_date'];
        protected $guarded=['id'];
}
