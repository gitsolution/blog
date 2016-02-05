<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsrProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usr_profiles', function (Blueprint $table) {

            
            $table->integer('id_login')->unsigned();
            $table->primary('id_login');
            $table->foreign('id_login')->references('id') ->on('usr_logins');
            $table->string('name',500);
            $table->string('lastname',500);
            $table->text('picture');
            $table->string('gender',20);
            $table->date('born_date');
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
        Schema::drop('usr_profiles');
    }
}
