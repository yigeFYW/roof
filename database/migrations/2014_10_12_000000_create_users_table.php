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
            $table->increments('uid');
            $table->string('name');
            $table->string('email')->unique();
            $table->char('password', 60);
            $table->char('mobile',11)->default(0);
            $table->rememberToken();
            $table->tinyInteger('category')->unsigned()->default(0);
            $table->integer('regtime')->unsigned()->default(0);
            $table->integer('lastlogin')->unsigned()->default(0);
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
