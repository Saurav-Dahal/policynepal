<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_inquiries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name', 32);
            $table->string('last_name', 32);
            $table->string('email',70);
            $table->string('agency_name', 100);
            $table->bigInteger('mobile_no');
            $table->string('address', 100);
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
        Schema::dropIfExists('project_inquiries');
    }
}
