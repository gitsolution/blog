<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsrRoleActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usr_role_actions', function (Blueprint $table) {
            $table->increments('id_role')->unsigned();
            $table->foreign('id_role')->references('id')->on('usr_roles');
            $table->integer('id_access')->unsigned();
            $table->foreign('id_access')->references('id')->on('cms_accesses');
            $table->string('action',100);
            $table->boolean('access');
            $table->boolean('active');
            $table->integer('register_by');
            $table->timestamp('register_date');
            $table->integer('modify_by');
            $table->dateTime('modify_date');
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
        Schema::drop('usr_role_actions');
    }
}
