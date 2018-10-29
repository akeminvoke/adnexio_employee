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

use Illuminate\Support\Facades\Storage;

//Main Page https://adnexio.my
Route::get('/', function () {
    return view('welcome');
});

//Register And Login Features
Auth::routes();

Route::get('/gredirect', 'SocialAuthGoogleController@redirect');
Route::get('/gcallback', 'SocialAuthGoogleController@callback');
Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');
Route::get('/admin','AdminController@admin');
Route::get('/user/activation/{token}', 'Auth\RegisterController@userActivation');

///Route::get('/employee/login','Auth\EmployeeLoginController@showLoginEmployee');
///Route::get('/employer/login','Auth\EmployerLoginController@showLoginEmployer');

//Redirect After Login
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/dashboard', 'DashboardController@index');
//Route::get('/employee/dashboard', 'EmployeeDashboardController@index');
//Route::get('/employer/dashboard', 'EmployerDashboardController@index');


//Insert Data Into The Database And Upload Video To Server And Amazon S3
Route::post('/home', 'HomeController@store');

//Insert Data Into The Database And Upload Video To Server And Amazon S3
Route::post('/save', 'UploadVideoToServerAndS3@store');

//Delete Uploaded Video From Server But Not Amazon S3
Route::post('/delete', 'DeleteVideoFromServer@store');

//User To View Past Video Recorded
//Route::get('/home', 'HomeController@show');
//Route::get('/video/home', 'VideoController@index');
Route::get('/video/video_recording', 'VideoRecordingController@index');
Route::get('/video/video_pastrecord', 'VideoPastRecordController@index');

//Example
Route::view('/examples/plugin', 'examples.plugin');
Route::view('/examples/blank', 'examples.blank');




















