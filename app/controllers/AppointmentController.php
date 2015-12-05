<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AppointmentController extends BaseController {

	public function generateOtp() {
	    $characters = '0123456789';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < 5; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	public function makeAppointment() {
		$doctor_id = Input::get('doctor_id');
		$clinic_id = Input::get('clinic_id');
		$name = Input::get('name');
		$email = Input::get('email');
		$time = Input::get('time');
		$phone = Input::get('phone');
		$description = Input::get('description');
		$otp = $this->generateOtp();
		$appointment = Appointment::create([
			'doctor_id' => $doctor_id,
			'clinic_id' => $clinic_id,
			'email' => $email,
			'name' => $name,
			'appointment_time' => $time,
			'phone' => $phone,
			'description' => $description,
			'otp' => $otp
		]);
		return Response::data($appointment);
	}

	public function verifyAppointment() {
		$otp = Input::get('otp');
		$email = Input::get('email');
		$phone = Input::get('phone');
		try {
			$appointment = Appointment::where('otp','=',$otp)->where('email','=',$email)->where('phone', '=', $phone)->firstOrFail();
			$appointment->verified = 1;
			$appointment->save();
			return Response::data($appointment);
		}catch(ModelNotFoundException $e) {
			return Response::invalid();
		}
	}
}