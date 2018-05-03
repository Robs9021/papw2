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