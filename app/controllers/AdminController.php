<?php

class AdminController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	public function getIndex() {
		$pro = Project::all();
		return View::make('admin', compact('pro'));
	}

	public function postUpload() {
		$file = Input::file('image');
		$destinationPath = public_path()."/uploads";
		$extension =$file->getClientOriginalExtension();
		$filename = time().".".$extension; 
		$upload_success = $file->move($destinationPath, $filename);
		 
		if( $upload_success ) {
		   return Response::json($filename, 200);
		} else {
		   return Response::json('error', 400);
		}
	}

	public function postAdd() {
		Project::create(Input::all());
	}

	public function postRm() {
		Project::find(Input::get('id'))->delete();
		return Redirect::to('admin');
	}

}
