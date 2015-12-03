<?php

class Clinic extends Eloquent {

	protected $table = 'clinics';
	protected $guarded = [];

	public function doctors() {
		return $this->belongsToMany('Doctor', 'doctor_clinic', 'clinic_id', 'doctor_id');
	}
}

