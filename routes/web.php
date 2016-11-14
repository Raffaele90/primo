<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\evento;
use App\luogo;

Route::get('/', function () {
    return view('welcome');
});

Route::get('prova', ['uses' => 'PersonaggioController@get_personaggio']);


Route::get('insert_personaggio', ['uses' => 'PersonaggioController@getForm']);

Route::get('edit_personaggio', ['uses' => 'PersonaggioController@get_form_edit']);

Route::post('get_personaggio', ['uses' => 'PersonaggioController@get_personaggio']);

Route::post('store', ['uses' => 'PersonaggioController@store']);
Route::post('store_ajax', ['uses' => 'PersonaggioController@store_ajax']);

Route::post('update', ['uses' => 'PersonaggioController@update']);


Route::post('luogo', ['uses' => 'LuogoController@insert_luogo']);


Route::post('get_sub_luoghi', ['uses' => 'LuogoController@get_sub_luoghi']);

Route::post('get_sub_eventi', ['uses' => 'EventoController@get_sub_eventi']);

Route::post('insert_evento', ['uses' => 'EventoController@insert_evento']);


Route::get('insert_evento', ['uses' => 'EventoController@getForm']);
Route::get('edit_evento', ['uses' => 'EventoController@get_form_edit']);
