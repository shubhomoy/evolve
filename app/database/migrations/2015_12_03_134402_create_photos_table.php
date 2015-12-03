<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function ($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->dateTime('photo_date');
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('lat')->nullable();
            $table->float('lon')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('photos');
    }
}
