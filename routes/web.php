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

Route::get('/', 'ContentsController@home');
Route::get('/clients', 'ClientController@index');
Route::get('/clients/new', 'ClientController@newClient');
Route::post('/clients/new', 'ClientController@create');
Route::get('/clients/{client_id}', 'ClientController@show');
Route::post('/clients/{client_id}', 'ClientController@modify');

Route::get('/reservations/{client_id}', 'RoomsController@checkAvailableRooms');
Route::post('/reservations/{client_id}', 'RoomsController@checkAvailableRooms');

Route::get('/book/room/{client_id}/{room_id}/{date_in}/{date_out}', 'ReservationsController@bookRoom');


Route::get('/about', function () {
    // returning an array as a response - JSON, basic API response
    $response_arr = [];
    $response_arr['author'] = 'G Man';
    $response_arr['version'] = '0.0.1'; 
    return $response_arr;
});

// Route::get('/', function () {
//     // passing data into the view
//     $data = [];
//     $data['version'] = 'v0.0.1';
//     return view('welcome', $data);
// });

Route::get('/di', 'ClientController@di');

Route::get('/facades/db', function(){
    return DB::select('SELECT * FROM table');
});

Route::get('/facades/encrypt', function(){
    return Crypt::encrypt('0123456789');
});

Route::get('/facades/decrypt', function(){
    return Crypt::decrypt('eyJpdiI6InAyS01cL0htdU41MjByRDRlVTM3bVZnPT0iLCJ2YWx1ZSI6IlVId1ZIemhsa1c0dVg1Q2RyS3JwMGhCbk1RbmY1N1ZubWNRcTlwYTBIQlE9IiwibWFjIjoiYzIwYWZiNzU1ZDA3NTYxZjM2MzJiOTk1OTYzNzA3Yjg2NDVmY2VhZTFmNjBkNDZhYTNhM2I2OTdhYjAwNTVmNiJ9');
});