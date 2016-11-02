<?php

namespace App\Http\Controllers;

use App\evento;
use Illuminate\Http\Request;

use App\Http\Requests;

class EventoController extends Controller
{
    public function insert_evento(Request $request)
    {

        $this->validate($request, [
            'denominazione_evento' => 'required|max:25|unique:evento',
            'tipo_evento' => 'required|max:25|unique:evento',

        ]);

        $evento = new evento();


        $evento->denominazione_evento = $request['denominazione_evento'];
        $evento->anno_evento = $request['anno_costruzione'];
//        $evento->descrizione_monumento = $request['descrizione_monumento'];
        $evento->tipo_evento = $request['tipo_evento'];
        $evento->tipo_sub_evento = $request['sub_tipo_evento'];
        $evento->descrizione_evento = $request['descrizione_evento'];
        $evento->origine_luogo_id = $request['denominazione_luogo'];
        $evento->nuovo_luogo_id = $request['nuova_localizzazione'];

        $evento->ulteriore_caratterizzazione = $request['ulteriore_caratterizzazione'];
        $evento->descrizione_movimento_opera = $request['descrizione_movimento_opera'];


        $evento->save();

        return $evento;
    }

    public function get_sub_eventi(Request $request){
        $evento = new evento();

        return $evento->get_sub_eventi($request['tipo_evento']);
    }
}
