<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooterImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('footer_id');
            $table->string('image');
            $table->string('image_url');
            $table->string('rank');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.s
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('footer_images');
    }
}
