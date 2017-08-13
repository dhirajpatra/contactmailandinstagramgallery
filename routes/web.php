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

Route::get('/', function () {
    return view('welcome');
});

Route::get('contact',
    ['as' => 'contact', 'uses' => 'QuestionController@create']);

Route::post('contact',
    ['as' => 'contact_store', 'uses' => 'QuestionController@store']);

Route::get('send_test_email', function(){
    Mail::raw('Sending emails with Mailgun and Laravel!', function($message)
    {
        $message->subject('Mailgun, Laravel and Dhiraj!');
        $message->from('no-reply@website_name.com', 'Website Name');
        $message->to('dhiraj.patra@gmail.com');
    });

});

Route::get('test_airtable', function(){
    $url = 'curl "https://api.airtable.com/v0/appT0jceZztOnwAub/questions?maxRecords=3&view=Grid%20view" \
    -H "Authorization: Bearer key4Se2RIw9tdA9pb"';
    $response = callByCurl($url);
    print_r($response);
});

/**
 * this is for login and later can add oauth2 as it is already installed in this application need configuration
 */
Route::get('gallery',
    ['as' => 'gallery', 'uses' => 'GalleryController@index']);

/**
 * after fetched the data create redis/memcached session with result
 */
Route::post('success',
    ['as' => 'success', 'uses' => 'GalleryController@success']);

/**
 * displauy photos in grid with pagination
 */
Route::get('show',
    ['as' => 'show', 'uses' => 'GalleryController@show']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
