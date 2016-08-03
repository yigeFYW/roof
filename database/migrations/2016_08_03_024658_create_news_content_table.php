<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_contents', function (Blueprint $table) {
            $table->increments('news_id');
            $table->string('title',20)->default('');
            $table->string('des',255)->default('');
            $table->string('image',255)->default('');
            $table->string('url',255)->default('');
            $table->integer('aid')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('news_contents');
    }
}
