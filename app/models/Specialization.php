<?php

class Specialization extends Eloquent {

	protected $table = 'specializations';
	protected $guarded = [];
	public $timestamps = false;

	public function doctors() {
		return $this->belongsToMany('Doctor', 'doctor_specialization', 'spec_id', 'doctor_id');
	}
}

