<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::view('/','new');

Route::get('new', function(){
	return view('new');
});

Route::get('shome', function () {
    return view('student-home');
});

Route::get('scatalog', function () {
    return view('student-course-catalog');
});

Route::get('scourse', function () {
    return view('student-course-overview');
});

Route::get('scoursemodule', function () {
    return view('student-course-module');
});

Route::get('scoursequiz', function () {
    return view('student-course-quiz');
});

Route::get('ihome', function () {
    return view('instructor-home');
});

Route::get('iaddcourse', function () {
    return view('instructor-add-course');
});

Route::get('declareUser', 'UserTesting@index');

Route::post('store', 'UserTesting@store');

Route::post('/register', function(){
	if(Request::ajax()){
		return Response::json(Request::all());
	}
});

Route::get('/checkEmpresas', 'UserTesting@showE');

Route::get('error', function(){
    return view("errors");
});