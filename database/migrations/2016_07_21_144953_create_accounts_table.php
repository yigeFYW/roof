<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('aid');
            $table->integer('uid')->unsigned()->default(0);
            $table->string('acc_name',255)->default('');
            $table->string('acc_id',255)->default('');
            $table->tinyInteger('acc_cat')->unsigned()->default(0);
            $table->string('acc_wechat',255)->default('');
            $table->char('acc_appid',20)->default('');
            $table->char('acc_secret',32)->default('');
            $table->char('acc_aeskey',43)->default('');
            $table->char('acc_token',20)->default('');
            $table->integer('regtime')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('accounts');
    }
}
