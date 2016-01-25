<?php

class SchoolAffiliation extends Eloquent {

	protected $table = 'school_affiliations';
	protected $guarded = [];

	public function schools() {
		return $this->belongsToMany('School', 'school_school_affiliation', 'school_affiliation_id', 'school_id');
	}

	public function scopeHasAffiliations($query, $affiliations) {
		return $query->where(function($q) use ($affiliations) {
			foreach($affiliations as $a) {
				$q->orWhere('affiliation', '=', $a);
			}
		});
	}
}

