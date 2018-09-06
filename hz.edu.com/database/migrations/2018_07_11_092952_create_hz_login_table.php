<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHzLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('hz_login', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('account')->length(64);
        //     $table->string('password')->length(255);
        //     $table->Integer('failedcnt');
        //     $table->string('resetpwd')->length(64);
        //     $table->tinyInteger('logintype')->length(4)->comment('0：normal 1: 管理员 1：家长 2：学生');
        //     $table->tinyInteger('usertype')->length(4);
        //     $table->tinyInteger('status')->length(4)->comment('0：无效 1：有效');
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('hz_login');
    }
}
