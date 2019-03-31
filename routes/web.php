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

// Landing Page Show
Route::get('/', 'PagesController@getHome');

// Datatable Row Modify
Route::get('/edit', 'DataRegisterController@getDataById');

// get day list by date for sidebar
Route::get('/getDate', 'DataRegisterController@getDateList');

// get Data by date for datatable
Route::get('/getDataByDate', 'DataRegisterController@getDataByDate');

// Data add submit in Datatable
Route::post('/submit', 'DataRegisterController@submit');

// Data modify in Datatable's Row
Route::post('/update', 'DataRegisterController@update');