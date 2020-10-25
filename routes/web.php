<?php
use App\Therapist;
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

Route::get('/', function () {
	$therapists = Therapist::get();
    return view('welcome',compact('therapists'));
});

Auth::routes();


Route::prefix('sitebackend')->group(function () {
   
Route::middleware(['auth'])->group(function (){
	//backend home
	Route::get('', function() {
		return view('backend.home');
	} );
Route::get('/sitebackend', function () {
    return view('backend.home');
});


		//View all
		Route::get('/therapists', 'TherapistController@index');
		//Create
		Route::get('/therapist/create', 'TherapistController@create');
		//store
		Route::post('/therapist', 'TherapistController@store');
		
		
		//update
		Route::post('/therapist/{id}', 'TherapistController@update')->where('id', '[0-9]+')->name('therapist.update');
		//Delete
		Route::get('/therapist/{id}/delete', 'TherapistController@destroy');

	});
});	
Route::post('/search','HomeController@search');

