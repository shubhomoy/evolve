<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SchoolController extends BaseController {

	public function all() {
		return Response::json(['msg' => 'valid', 'schools' => School::with(['affiliations', 'types'])->get()]);
	}
}