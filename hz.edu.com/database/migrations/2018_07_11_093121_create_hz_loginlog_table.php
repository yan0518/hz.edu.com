<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHzLoginlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hz_loginlog', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('login_id');
            $table->string('ip')->length(64);
            $table->string('content')->length(255);
            $table->string('result')->length(255);
            $table->string('sqlmsg')->length(255);
            $table->string('comment')->length(255);
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
        Schema::dropIfExists('hz_loginlog');
    }
}
