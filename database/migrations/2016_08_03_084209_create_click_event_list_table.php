<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClickEventListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('click_event_lists', function (Blueprint $table) {
            $table->increments('eid');
            $table->integer('aid')->unsigned()->default(0);
            $table->string('event_key',64)->default('');
            $table->integer('mid')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('click_event_lists');
    }
}
