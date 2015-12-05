<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('appointments', function ($table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned();
            $table->integer('clinic_id')->unsigned();
            $table->string('email');
            $table->datetime('appointment_time');
            $table->string('phone', 20);
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('otp', 5)->nullable();
            $table->integer('verified')->default(0);
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('clinic_id')->references('id')->on('clinics');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('appointments');
	}

}
