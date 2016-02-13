<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
use App\Http\Requests;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->boolean('active')->default(0);
            $table->string('confirm_token', 100);
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'name'=>'admin',
            'lastName'=>'admin',
            'email'=>'admin@admin',
            'password'=>'$2y$10$v6qK6pruMmcuxotTHn8wJedV8eQJWRhWnut/8C/3xK1vv11KGzsOe',
            'active'=>'1',
            'confirm_token'=>'',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
