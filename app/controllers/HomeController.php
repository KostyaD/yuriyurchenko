<?php

class HomeController extends BaseController {

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

	public function index()
	{
		$pro = Project::all();
		return View::make('index', compact('pro'));
	}

	public function loginPage()
	{
		return View::make('login');
	}

	public function login()
	{
		$rem = true;
		if(Auth::attempt(array('user' => Input::get('user'), 'password' => Input::get('password')), $rem))
		
		{ return Redirect::to('admin'); } 
		else 
		{ return Redirect::back()->with('message', 'Password or user isn\'t correct.'); }

	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

}
