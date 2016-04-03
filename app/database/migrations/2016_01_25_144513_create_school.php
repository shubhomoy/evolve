<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchool extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schools', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('fee_structure')->nullable();
            $table->string('logo_url')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('email')->nullable();
            $table->string('x_coord')->nullable();
            $table->string('y_coord')->nullable();
            $table->text('address')->nullable();
            $table->string('principal_name')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('schools');
	}

}
