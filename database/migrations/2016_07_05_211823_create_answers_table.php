<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('answers_id')->unique();
            $table->integer('questions_id')->unsigned();
            $table->foreign('questions_id')->references('questions_id')->on('questions')->onDelete('cascade');
            $table->string('answer_es');
            $table->string('answer_en');
            $table->boolean('response');
            $table->string('rel_column');
            $table->integer('rel_response');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->dateTime('deleted_at')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::drop('answers');
    }
}
