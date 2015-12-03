<?php

class User extends Eloquent {

	protected $table = 'users';
	protected $guarded = ['password', 'remember_token', 'password'];
	protected $hidden = [
		'remember_token',
		'password'
	];

	public function accessTokens() {
		return $this->hasMany('AccessToken', 'user_id');
	}
}

