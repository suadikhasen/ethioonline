<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_time', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('exam_code');
            $table->datetime('pre_begining');
            $table->datetime('begning');
            $table->datetime('ending');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_time');
    }
}
