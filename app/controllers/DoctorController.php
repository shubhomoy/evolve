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
}