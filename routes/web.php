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

///use Illuminate\Support\Facades\Storage;

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

//Redirect After Login
Route::get('/home', 'HomeController@index')->name('home');

//Profile Function
Route::get('/profile/profile_aboutme', 'ProfileAboutmeController@index');
Route::post('/profile/profile_aboutme', 'ProfileAboutmeController@editPost');

Route::get('/profile/profile_experience', 'ProfileExperienceController@index');
Route::get('/profile/profile_cvupload', 'ProfileCvuploadController@index');

//Video Interview Function
Route::get('/video/video_recording', 'VideoRecordingController@index');
Route::get('/video/video_pastrecord', 'VideoPastRecordController@index');
Route::post('/video/video_eyeblink_result', 'VideoEyeBlinkController@updateEyeBlink');


//Insert Data Into The Database And Upload Video To Server And Amazon S3
Route::post('/save', 'UploadVideoToServerAndS3@store');
//Delete Uploaded Video From Server But Not Amazon S3
Route::post('/delete', 'DeleteVideoFromServer@store');

//Upload Data Into The Database And Upload Video To Server And Amazon S3 Via Choose File and Upload
Route::post('/home', 'HomeController@store');

//Example
Route::view('/examples/plugin', 'examples.plugin');
Route::view('/examples/blank', 'examples.blank');




















