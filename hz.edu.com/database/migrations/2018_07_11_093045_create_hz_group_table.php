<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHzGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('hz_group', function (Blueprint $table) { 
        //     $table->increments('id');
        //     $table->string('name')->length(64);
        //     $table->string('permission')->length(255);
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
        // Schema::dropIfExists('hz_group');
    }
}
