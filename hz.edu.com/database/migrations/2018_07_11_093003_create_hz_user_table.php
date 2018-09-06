<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHzUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hz_user', function (Blueprint $table) {  
            $table->increments('id');
            $table->Integer('login_id');
            $table->string('name')->length(64);
            $table->string('url')->length(255);
            $table->string('photo')->length(255);
            $table->string('cell')->length(20);
            $table->string('email')->length(64);
            $table->tinyInteger('status')->length(4)->default(1)->comment('0：无效 1：有效');
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
        Schema::dropIfExists('hz_user');
    }
}
