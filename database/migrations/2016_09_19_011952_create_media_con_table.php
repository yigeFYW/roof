<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaConTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_cons', function (Blueprint $table) {
            $table->increments('mid');
            $table->integer('aid')->unsigned()->default(0);
            $table->integer('uid')->unsigned()->default(0);
            $table->integer('subtime')->unsigned()->default(0);
            $table->integer('sub_name')->unsigned()->default(0);
            $table->char('file_name',20)->default('');
            $table->char('file_type',20)->default('');
            $table->char('file_size',10)->default('');
            $table->char('resolving',10)->default('');
            $table->string('file_url')->default('');
            $table->string('file_info')->default('');
            $table->string('file_tag')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('media_cons');
    }
}
