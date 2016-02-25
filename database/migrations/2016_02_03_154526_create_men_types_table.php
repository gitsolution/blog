<?php

use Illuminate\Database\Schema\Blueprint;
use App\men_type;
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
            $table->text('uri');
            $table->integer('order_by');
            $table->datetime('publish');
            $table->boolean('active');
            $table->integer('register_by');
            $table->integer('modify_by');
            $table->timestamps();
        });
    
          /*men_type::create([
            'title'=>'topmenu',
            'description'=>'menu de ariba',
            'active'=>'1',
            'register_by'=>'1',
            'modify_by'=>'1',
        ]);*/
    
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
