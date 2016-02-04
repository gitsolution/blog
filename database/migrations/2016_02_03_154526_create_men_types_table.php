<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('men_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',250);
            $table->text('description');
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
        Schema::drop('men_types');
    }
}
