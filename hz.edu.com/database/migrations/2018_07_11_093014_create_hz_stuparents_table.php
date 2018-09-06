<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHzStuparentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hz_stuparents', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('login_id');
            $table->Integer('student_id');
            $table->string('name')->length(64);
            $table->string('cell')->length(20);
            $table->string('email')->length(64);
            $table->tinyInteger('status')->length(4)->comment('0：无效 1：有效');
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
        Schema::dropIfExists('hz_stuparents');
    }
}
