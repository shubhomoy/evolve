<?php

class SpecializationSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();
		DB::table('schools')->delete();
		DB::table('school_types')->delete();
		DB::table('school_affiliations')->delete();
	}

}
