<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorContactNumberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('doctor_contacts', function ($table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned();
            $table->string('contact_no');
            $table->foreign('doctor_id')->references('id')->on('doctors');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('doctor_contacts');
	}

}
