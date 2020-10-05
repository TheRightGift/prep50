<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('question');
            $table->text('optionA');
            $table->text('optionB');
            $table->text('optionC');
            $table->text('optionD');
            $table->string('answer');
            $table->string('fileName')->nullable();
            $table->text('passage')->nullable();
            $table->year('quesYear');
            $table->tinyInteger('quesYearNum');
            $table->text('explanation')->nullable();
            $table->bigInteger('objective_id')->unsigned();     
            
            $table->foreign('objective_id')->references('id')->on('objectives')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
