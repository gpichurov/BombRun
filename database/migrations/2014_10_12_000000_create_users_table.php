<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('facebook_id')->nullable();
            $table->string('big_avatar')->nullable();
            $table->string('small_avatar')->nullable();
            $table->boolean('admin')->defaul(false);
            $table->unsignedInteger('energy')->defaul(100);
            $table->unsignedInteger('bombs')->defaul(5);
            $table->unsignedInteger('speed')->defaul(100);
            $table->unsignedInteger('coins')->defaul(0);
            $table->unsignedInteger('kills')->defaul(0);
            $table->unsignedInteger('scrolls')->defaul(0);
            $table->unsignedInteger('games')->defaul(0);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
