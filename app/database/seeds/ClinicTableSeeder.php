<?php

class ClinicTableSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();
		DB::table('clinics')->delete();
		Clinic::create(['name' => 'Apollo', 'x_coord' => '12.45', 'y_coord' => '54.23', 'address' => 'Delhi', 'email' => 'apollo', 'description' => 'apollo']);
		Clinic::create(['name' => 'Fortis', 'x_coord' => '56.45', 'y_coord' => '32.23', 'address' => 'Noida', 'email' => 'fortis', 'description' => 'fortis']);
	}

}
