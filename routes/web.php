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

//Redirect After Login First Time
Route::get('/main', 'MainController@index')->name('main');
Route::post('/main/first_login', 'MainController@store');

//Redirect After Login IF Done Fill Info
Route::get('/home', 'HomeController@index')->name('home');

//Profile Function

//profile-aboutme->fahmi
Route::get('/profile/profile_aboutme', 'ProfileAboutmeController@index');
Route::post('/profile/profile_aboutme', 'ProfileAboutmeController@editPost');

//profile-experience->hakim
Route::get('/profile/profile_experience', 'ProfileExperienceController@index');
Route::post('/profile/profile_experience/store', 'ProfileExperienceController@store');
Route::post('/profile/profile_experience/update', 'ProfileExperienceController@update');
Route::post('/profile/profile_experience/getjb', 'ProfileExperienceController@getjb');
Route::post('/profile/profile_experience/getjobspec', 'ProfileExperienceController@getjobspec');
Route::post('/profile/profile_experience/delete', 'ProfileExperienceController@destroy');

//profile-education->hakim
Route::get('/profile/profile_education', 'ProfileEducationControllerr@index');
Route::post('/profile/profile_education/store', 'ProfileEducationControllerr@store');
Route::post('/profile/profile_education/update', 'ProfileEducationControllerr@update');
Route::post('/profile/profile_education/delete', 'ProfileEducationControllerr@destroy');
Route::post('/profile/profile_education/getcountry', 'ProfileEducationControllerr@getcountry');
Route::post('/profile/profile_education/getstates', 'ProfileEducationControllerr@getstates');
Route::post('/profile/profile_education/getcourse', 'ProfileEducationControllerr@getcourse');
Route::post('/profile/profile_education/getAllCourse', 'ProfileEducationControllerr@getAllCourse');
Route::post('/profile/profile_education/getuni', 'ProfileEducationControllerr@getuni');


//experience->hakim
Route::get('/profile/profile_cvupload', 'ProfileCvuploadController@index');
Route::post('/profile/profile_cvupload', 'ProfileCvuploadController@filestore');
Route::post('/profile/profile_cvupload/dlt', 'ProfileCvuploadController@fileDestroy');
Route::post('profile/profile_cvupload/pullback','ProfileCvuploadController@retrievefilename');
Route::get('/cv_uploads/download/', 'ProfileCvuploadController@getdownload');


//assesment-Personality Test Function->fahmi
Route::get('/personality/personality_career', 'PersonalityCareerController@index');
Route::post('/personality/personality_career_createAssessmentID', 'PersonalityCareerController@createAssessmentID');
Route::post('/personality/personality_career_storeDataForEachAssessmentStatusYes', 'PersonalityCareerController@storeDataForEachAssessmentStatusYes');
Route::post('/personality/personality_career_storeDataForEachAssessmentStatusNo', 'PersonalityCareerController@storeDataForEachAssessmentStatusNo');

//Video Interview Function
Route::get('/video/video_recording', 'VideoRecordingController@index');
Route::get('/video/video_pastrecord', 'VideoPastRecordController@index');

//Insert Data Into The Database And Upload Video To Server And Amazon S3
Route::post('/save', 'UploadVideoToServerAndS3@store');

//Delete Uploaded Video From Server But Not Amazon S3
Route::post('/delete', 'DeleteVideoFromServer@store');

//Upload Data Into The Database And Upload Video To Server And Amazon S3 Via Choose File and Upload
Route::post('/home', 'HomeController@store');

//Example
Route::view('/examples/plugin', 'examples.plugin');
Route::view('/examples/blank', 'examples.blank');




















