<?php

class Doctor extends Eloquent {

	protected $table = 'doctors';
	protected $guarded = [];

	public function clinics() {
		return $this->belongsToMany('Clinic', 'doctor_clinic', 'doctor_id', 'clinic_id');
	}

	public function contacts() {
		return $this->hasMany('DoctorContacts', 'doctor_id');	
	}

	public function appointments() {
		return $this->hasMany('Appointments', 'doctor_id');
	}

	public function specializations() {
		return $this->belongsToMany('Specialization', 'doctor_specialization', 'doctor_id', 'spec_id');
	}
}

