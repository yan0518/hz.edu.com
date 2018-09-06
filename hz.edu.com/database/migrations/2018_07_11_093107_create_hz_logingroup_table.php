<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHzLogingroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('hz_logingroup', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->Integer('login_id');
        //     $table->Integer('group_id');
        //     $table->tinyInteger('status')->length(4)->comment('0：无效 1：有效');
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
        // Schema::dropIfExists('hz_logingroup');
    }
}
