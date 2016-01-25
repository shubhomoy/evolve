<?php

class School extends Eloquent {

	protected $table = 'schools';
	protected $guarded = [];

	public function affiliations() {
		return $this->belongsToMany('SchoolAffiliation', 'school_school_affiliation', 'school_id', 'school_affiliation_id');
	}

	public function types() {
		return $this->belongsToMany('SchoolType', 'school_school_type', 'school_id', 'school_type_id');
	}

	public function scopeHasAffiliations($query, $affiliations) {
		return $this->affiliations()->where(function($q) use ($affiliations) {
			foreach($affiliations as $a) {
				$q->orWhere('affiliation','=',$a);
			}
		});
	}
}

