<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DoctorController extends BaseController {

	public function show($id) {	
		$doctor = Doctor::with('clinics', 'contacts')->find($id);
		if($doctor) {
			return Response::json(['msg' => 'valid', 'doctor' => $doctor]);
		}else {
			return Response::invalid();
		}
	}

	public function search() {
		$q = Input::get('q');
		$doctors = Doctor::where('name', 'like', $q.'%')->get();
		$result = [];
		foreach($doctors as $doctor) {
			array_push($result, $doctor);
		}
		$clinics = Clinic::with('doctors.contacts')->where('name', 'like', $q.'%')->orWhere('address', 'like', $q.'%')->get();
		foreach($clinics as $clinic) {
			foreach($clinic->doctors as $doctor) {
				array_push($result, $doctor);
			}
		}
		return Response::data($result);
	}

	public function signup() {
		$name = Input::get('name');
		$reg_id = Input::get('reg_id');
		$address = Input::get('address');
		$email = Input::get('email');
		$description = Input::get('description');

		$doctor = Doctor::create(['name' => $name, 'reg_id' => $reg_id, 'address' => $address, 'email' => $email, 'description' => $description]);

		return Response::data($doctor);
	}

	public function login() {
		$name = Input::get('name');
		$reg_id = Input::get('reg_id');
		try{
			$doctor = Doctor::where('name', '=', $name)->where('reg_id', '=', $reg_id)->firstOrFail();
			return Response::data($doctor);
		}catch(ModelNotFoundException $e) {
			return Response::unauthorized();
		}
	}

	public function showAppointments($id) {
		$appointments = Appointment::with('clinic')->where('verified','=', 1)->where('doctor_id', '=', $id)->get();
		return Response::data($appointments);
	}

	public function addRemoveClinic($doctor_id, $clinic_id) {
		$res = DB::select('select * from doctor_clinic where doctor_id='.$doctor_id.' and clinic_id='.$clinic_id);
		if($res) {
			DB::table('doctor_clinic')->where('doctor_id','=',$doctor_id)->where('clinic_id','=',$clinic_id)->delete();
		}else{
			DB::table('doctor_clinic')->insert(['doctor_id' => $doctor_id, 'clinic_id' => $clinic_id]);
		}
	}

	public function showAllSpecializations() {
		$s = Specialization::all();
		return Response::data($s);
	}

	public function addRemoveSpecialization($doctor_id, $spec_id) {
		$res = DB::select('select * from doctor_specialization where doctor_id='.$doctor_id.' and spec_id='.$spec_id);
		if($res) {
			DB::table('doctor_specialization')->where('doctor_id','=',$doctor_id)->where('spec_id','=',$spec_id)->delete();
		}else{
			DB::table('doctor_specialization')->insert(['doctor_id' => $doctor_id, 'spec_id' => $spec_id]);
		}
	}
}