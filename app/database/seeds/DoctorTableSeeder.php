<?php

class DoctorTableSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();
		DB::table('doctors')->delete();
		Doctor::create(['name' => 'Shubhomoy', 'reg_id' => '12345', 'photo' => 'shubho.jpg', 'address' => 'Delhi', 'email' => 'biswas', 'description' => 'biswas']);
		Doctor::create(['name' => 'Agam', 'reg_id' => '345t3', 'photo' => 'agam.jpg', 'address' => 'Bhilai', 'email' => 'agam', 'description' => 'gupto']);
		Doctor::create(['name' => 'Shubhakar', 'reg_id' => 'c343', 'photo' => 'shubha.jpg', 'address' => 'Kolkatta', 'email' => 'shubha', 'description' => 'shubha']);
	}

}
