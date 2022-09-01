<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 64);
            $table->string('end_date', 64);
            $table->string('job_category', 64);
            $table->string('job_level', 64);
            $table->string('no_of_vacancy', 32);
            $table->string('employment_type', 64);
            $table->string('salary', 64);
            $table->string('education_level', 64); 
            $table->string('experience', 100); 
            $table->string('image');
            $table->string('image_url');
            $table->mediumText('job_description');
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
        Schema::dropIfExists('vacancies');
    }
}
