<?php

class SpecializationSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();
		DB::table('specializations')->delete();
		Specialization::create(['detail' => 'ENT']);
		Specialization::create(['detail' => 'Audiologist']);
		Specialization::create(['detail' => 'Cardiologist']);
		Specialization::create(['detail' => 'Dentist']);
		Specialization::create(['detail' => 'Dermatologist']);
		Specialization::create(['detail' => 'Gynecologist']);
		Specialization::create(['detail' => 'General Physician']);
		Specialization::create(['detail' => 'Psychiatrist']);
		Specialization::create(['detail' => 'Neurologist']);
		Specialization::create(['detail' => 'Pediatrician']);
		Specialization::create(['detail' => 'Plastic Surgeon']);
		Specialization::create(['detail' => 'Urologist']);
	}

}
