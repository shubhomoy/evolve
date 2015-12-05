<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClinicController extends BaseController {

	public function show($id) {	
		$clinic = Clinic::with('doctors', 'facilities')->find($id);
		if($clinic) {
			return Response::json(['msg' => 'valid', 'clinic' => $clinic]);
		}else {
			return Response::invalid();
		}
	}

	public function index() {
		$clinics = Clinic::all();
		return Response::data($clinics);
	}
}