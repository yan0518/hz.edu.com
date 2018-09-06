<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHzStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hz_students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->length(64);
            $table->string('school')->length(255);
            $table->date('birthday');
            $table->string('aclass')->length(64);
            $table->tinyInteger('courses')->length(4)->comment('0：优秀 1：中等偏上 2：中等 3 中等偏下 4 较差');
            $table->tinyInteger('isremedial')->length(4)->comment('0：无 1：有');
            $table->tinyInteger('status')->length(4)->comment('0：无效 1：有效');
            $table->string('perplex')->length(255);
            $table->string('way')->length(255);
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
        Schema::dropIfExists('hz_students');
    }
}
