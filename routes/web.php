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
    // return view('welcome');
    return '<h2>Landon App Page</h2>';
});

Route::get('/about', function () {
    // returning an array as a response - JSON, basic API response
    $response_arr = [];
    $response_arr['author'] = 'G Man';
    $response_arr['version'] = '0.0.1'; 
    return $response_arr;
});

Route::get('/', function () {
    // passing data into the view
    $data = [];
    $data['version'] = 'v0.0.1';
    return view('welcome', $data);
});

Route::get('/di', 'ClientController@di');