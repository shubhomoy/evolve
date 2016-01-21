<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clinics', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->float('x_coord')->nullable();
            $table->float('y_coord')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clinics');
	}

}
