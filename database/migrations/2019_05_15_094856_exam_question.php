<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExamQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('exam_code');
            $table->longText('main_question');
            $table->longText('choice_a');
            $table->longText('choice_b');
            $table->longText('choice_c');
            $table->longText('choice_d');
            $table->longText('choice_e');
            $table->string('correct_answer');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_questions');
    }
}
