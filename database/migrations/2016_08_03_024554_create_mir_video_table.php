<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMirVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mir_videos', function (Blueprint $table) {
            $table->increments('mid');
            $table->string('title',20)->default('');
            $table->string('des',255)->default('');
            $table->string('media_id',500)->default('');
            $table->string('thumb_media_id',500)->default('');
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
        Schema::drop('mir_videos');
    }
}
