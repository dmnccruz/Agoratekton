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


// Route::get('/timeline', 'TimelineController@index');

Auth::routes();

// Route::group(['middleware' => 'auth'], function () {

// if (env('APP_ENV') === 'production') {
//     URL::forceScheme('https');
// }

Route::get('/meeting-room/{meetingid}/{id}', 'MeetingController@index');
Route::post('/pusher/auth', 'MeetingController@authenticate');

Route::get('/call/{id}/{callerName}/{callerId}/{meetingId}', 'EventController@callEvent');
Route::get('/cancelCall/{id}', 'EventController@cancelCall');
Route::get('/declineCall/{id}', 'EventController@declineCall');
Route::get('/startMeeting/{id}', 'EventController@startMeeting');
Route::get('/endMeeting/{id}', 'EventController@endMeeting');
Route::get('/addNote/{id}/{noteBody}', 'EventController@addNote');
Route::get('/meetingRoom/{meetingid}/{callerId}/{id}', 'EventController@meetingRoom');
Route::get('/setmeet/{id}/{recname}/{callerId}/{callername}/{dateInput}/{topic}/{callerAvatar}', 'EventController@setMeeting');
// Route::get('/setmeet/{id}/{recname}/{callerId}/{callername}/{dateInput}/{topic}', 'EventController@setMeeting');
Route::get('/declineRequest/{id}', 'EventController@declineRequest');
Route::get('/acceptRequest/{id}', 'EventController@acceptRequest');

Route::get('/logoutt/{id}', 'LogController@logoutt');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/loginn/{id}', 'LogController@loginn');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'PostController@index');
Route::get('/timeline', 'PostController@index');

Route::get('/newUser/{name}/{email}/{password}/{avatar}/{roleId}', 'PostController@newUser');
Route::post('/add-post', 'PostController@store');
Route::post('/updatepost/{id}', 'PostController@updatepost');
Route::get('/deletepost/{myid}/{postid}', 'PostController@deletepost');

Route::get('/hidepost/{myid}/{postid}', 'PostController@hidepost');
Route::get('/unhidepost/{myid}/{postid}', 'PostController@unhidepost');
Route::get('/sendcomment/{myid}/{postid}/{commentbody}', 'PostController@sendcomment');
Route::get('/deletecomment/{myid}/{postid}/{commentid}', 'PostController@deletecomment');
// Route::patch('/editcomment/{myid}/{postid}/{commentid}/{commentbody}', 'PostController@editcomment');
Route::get('/editcomment/{myid}/{postid}/{commentid}/{commentbody}', 'PostController@editcomment');
Route::get('/likepost/{myid}/{postid}', 'PostController@likepost');
Route::get('/unlikepost/{myid}/{postid}', 'PostController@unlikepost');
Route::get('/sendmessage/{myid}/{toid}/{messagebody}', 'PostController@sendmessage');
Route::get('/storeRequest/{callerId}/{recId}/{callerName}/{recName}/{date}/{topic}', 'PostController@storeRequest');

Route::get('/landing', 'LandingController@index');

// });



