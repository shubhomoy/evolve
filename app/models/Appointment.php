<?php

class Appointment extends Eloquent {

	protected $table = 'appointments';
	protected $guarded = [];
	public $timestamps = false;

	public function clinic() {
		return $this->hasOne('Clinic', 'id', 'clinic_id');
	}
}

