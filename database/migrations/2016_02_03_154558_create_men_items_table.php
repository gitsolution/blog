<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('men_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_men_menu')->unsigned();
            $table->foreign('id_men_menu')->references('id')->on('men_menus');
            $table->string('title',250);
            $table->text('description');
            $table->string('size',20);
            $table->text('uri');
            $table->string('level',45);
            $table->string('order',45);
            $table->boolean('publish');
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
        Schema::drop('men_items');
    }
}
