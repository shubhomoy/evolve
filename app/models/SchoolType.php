<?php

class SchoolType extends Eloquent {

	protected $table = 'school_types';
	protected $guarded = [];

	public function schools() {
		return $this->belongsToMany('School', 'school_school_type', 'school_type_id', 'school_id');
	}

	public function scopeHasTypes($query, $types) {
		return $query->where(function($q) use ($types) {
			foreach($types as $t) {
				$q->orWhere('type_name', '=', $t);
			}
		});
	}
}

