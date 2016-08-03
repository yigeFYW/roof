<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keywords', function (Blueprint $table) {
            $table->increments('kid');
            $table->integer('aid')->unsigned()->default(0);
            $table->integer('mid')->unsigned()->default(0);
            $table->tinyInteger('key_cat')->default(0);
            $table->string('word',255)->default('');
            $table->tinyInteger('rescat')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('keywords');
    }
}
