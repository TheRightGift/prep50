<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->enum('active', ['Y', 'N']);
            $table->date('dateCompleted');
            $table->smallInteger('progress');
            $table->decimal('sortprogress', 5, 2);
            $table->bigInteger('objective_id')->unsigned(); 
            $table->bigInteger('user_id')->unsigned();    
            $table->bigInteger('userSubject_id')->unsigned();  
            
            $table->foreign('userSubject_id')->references('id')->on('user_subjects')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
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
        Schema::dropIfExists('activities');
    }
}
