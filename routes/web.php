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
    return view('index');
});

Route::get('/cities', 'CityController@getAll');
Route::get('/city/{id}', 'CityController@find');
Route::get('/country/{id}/cities', 'CountryController@getCitiesFromCountry')->where("id", "[0-9]{1,}");
Route::get('/country/{id}', 'CountryController@getCountry')->where("id", "[0-9]{1,}");


Route::get('/{continent}/countries', 'CountryController@getCountriesFromContinent')->where("name", "[a-zA-Z]{2,}");
Route::get('/hello/{name}', 'GreetingController@sayHello')->where("name", "[a-zA-Z]{2,}");
