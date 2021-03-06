<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('uses' => 'HomeController@index'));
Route::get('login', array('before' => 'login', 'uses' => 'HomeController@loginPage'));
Route::post('login', array('as' => 'login', 'uses' => 'HomeController@login'));
Route::get('logout', 'HomeController@logout');

Route::controller('admin', 'AdminController');
