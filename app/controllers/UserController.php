<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends BaseController {

	public function generateOtp() {
	    $characters = '0123456789';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < 5; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	public function generateAccessToken() {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < 32; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	public function login() {
		$email = Input::get('email');
		$phone = Input::get('phone');
		$otp = $this->generateOtp();
		try {
			$user = User::where('email','=',$email)->where('phone','=',$phone)->firstOrFail();
			$user->otp = $otp;
			$user->save();
			return Response::data($user);
		}catch(ModelNotFoundException $e) {
			// Create user
			$user = User::create(['email' => $email, 'phone' => $phone, 'otp' => $otp]);
			return Response::data($user);
		}
	}

	public function verify() {
		$receivedOtp = Input::get('otp');
		$email = Input::get('email');
		$phone = Input::get('phone');
		try {
			$user = User::where('email', '=', $email)->where('phone', '=', $phone)->where('otp', '=', $receivedOtp)->firstOrFail();
			$accessToken = AccessToken::create(['token' => $this->generateAccessToken(), 'user_id' => $user->id]);
			return Response::json(['msg'=>'valid', 'user'=>$user, 'token' => $accessToken->token]);
		}catch(ModelNotFoundException $e) {
			return Response::unauthorized();
		}
	}
}