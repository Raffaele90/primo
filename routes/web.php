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
use App\Personaggio;

Route::get('prova2', function () {
    return Personaggio::whereNotIn('id', [73,67])->orderBy("cognome", "ASC")->get();
});

Route::get('prova', ['uses' => 'EventoController@get_evento']);


Route::get('insert_personaggio', ['uses' => 'PersonaggioController@getForm']);

Route::get('edit_personaggio', ['uses' => 'PersonaggioController@get_form_edit']);
Route::post('get_personaggio', ['uses' => 'PersonaggioController@get_personaggio']);
Route::post('remove_personaggio', ['uses' => 'PersonaggioController@remove_personaggio']);

Route::get('get_dinastia', ['uses' => 'PersonaggioController@get_dinastia']);


Route::post('store', ['uses' => 'PersonaggioController@store']);
Route::post('store_ajax', ['uses' => 'PersonaggioController@store_ajax']);
Route::post('update', ['uses' => 'PersonaggioController@update']);


Route::post('luogo', ['uses' => 'LuogoController@insert_luogo']);
Route::get('edit_luogo', ['uses' => 'LuogoController@get_form_edit']);
Route::post('get_luogo', ['uses' => 'LuogoController@get_luogo']);
Route::post('update_luogo', ['uses' => 'LuogoController@update']);
Route::post('get_sub_luoghi', ['uses' => 'LuogoController@get_sub_luoghi']);
Route::post('remove_luogo', ['uses' => 'LuogoController@remove_luogo']);



Route::post('get_sub_eventi', ['uses' => 'EventoController@get_sub_eventi']);
Route::post('insert_evento', ['uses' => 'EventoController@insert_evento']);
Route::post('remove_evento', ['uses' => 'EventoController@remove_evento']);
Route::get('insert_evento', ['uses' => 'EventoController@getForm']);
Route::get('edit_evento', ['uses' => 'EventoController@get_form_edit']);
Route::post('get_evento', ['uses' => 'EventoController@get_evento']);

Route::post('update_evento', ['uses' => 'EventoController@update']);
