<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name', 64);
            $table->string('last_name', 64)->nullable();
            $table->string('email',100);
            $table->bigInteger('phone_no');
            $table->string('address', 150);
            $table->string('college', 150);
            $table->string('fos', 150);
            $table->string('degree', 100); 
            $table->string('degree_from', 100); 
            $table->string('degree_to', 100)->nullable();
            $table->string('last_comp_name', 100)->nullable(); 
            $table->string('designation', 100)->nullable();
            $table->string('experience_from', 100)->nullable(); 
            $table->string('experience_to', 100)->nullable();
            $table->string('resume');
            $table->string('cov_letter')->nullable();
            $table->string('resume_url');
            $table->string('cov_letter_url')->nullable();
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
        Schema::dropIfExists('form_data');
    }
}
