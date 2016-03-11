<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmsAccesses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_accesses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sysmodule')->unsigned();
            $table->foreign('id_sysmodule')->references('id')->on('sys_modules');
            $table->string('title',250);
            $table->text('description');
            $table->boolean('active');
            $table->text('rules');
            $table->integer('register_by');
            $table->integer('modify_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {     
        Schema::drop('cms_accesses');
    }
}
