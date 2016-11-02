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

Route::post('prova', function (){
    $personaggio = \App\Personaggio::find(1);
    $personaggio->eventi()->attach(1);

    return view('insert_personaggio');
});

Route::get('insert_personaggio', ['uses' => 'PersonaggioController@getForm']);
Route::get('edit_personaggio', ['uses' => 'PersonaggioController@get_form_edit']);


Route::post('store', ['uses' => 'PersonaggioController@store']);

Route::post('luogo', ['uses' => 'LuogoController@insert_luogo']);


Route::post('get_sub_luoghi', ['uses' => 'LuogoController@get_sub_luoghi']);

Route::post('get_sub_eventi', ['uses' => 'EventoController@get_sub_eventi']);

Route::post('insert_evento', ['uses' => 'EventoController@insert_evento']);

Route::get('prova_merda', function (){

    return "raf";
});