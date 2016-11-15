<?php

namespace App\Http\Controllers;

use App\evento;
use Illuminate\Http\Request;
use App\luogo;
use App\Personaggio;

use App\Http\Requests;


class EventoController extends Controller
{


    public function get_evento(Request $request)
    {

        $evento = evento::find($request['id']);

        $origine_luogo = null;
        $nuovo_luogo = null;
        if ($evento['origine_luogo_id'] != null or $evento['origine_luogo_id'] != "")
            $origine_luogo = luogo::find($evento['origine_luogo_id']);

        if ($evento['nuovo_luogo_id'] != null or $evento['nuovo_luogo_id'] != "")
            $nuovo_luogo = luogo::find($evento['origine_luogo_id']);

        $evento['nuovo_luogo'] = $nuovo_luogo['denominazione_luogo'];
        $evento['vecchio_luogo'] = $origine_luogo['denominazione_luogo'];


        $evento['personaggi_associati'] = evento::find($request['id'])->personaggi()->get();


        $arr = [];
        for ($i = 0; $i < count($evento['personaggi_associati']); $i++) {
            array_push($arr, $evento['personaggi_associati'][$i]['id']);

        }
        $evento['personaggi_associati'] = Personaggio::find($arr);
        $evento['personaggi_non_associati'] = Personaggio::whereNotIn('id', $arr)->get()->toArray();

        return $evento;


    }

    public function get_form_edit()
    {
        $luogo = new luogo();

        $data['luoghi'] = luogo::orderBy('denominazione_luogo', 'ASC')->get();
        $data['tipo_luoghi'] = $luogo->get_tipo_luoghi();
        $data['dinastia'] = [];
        $data['personaggi'] = personaggio::orderBy('cognome', 'ASC')->get();
        $data['eventi'] = evento::orderBy('denominazione_evento', 'ASC')->get();
        $data['tipo_eventi'] = evento::orderBy('tipo_evento', 'ASC')->get();

        return view('edit_evento')->with('data', $data);

    }

    public function getForm()
    {
        $luogo = new luogo();

        $data['luoghi'] = luogo::orderBy('denominazione_luogo', 'ASC')->get();
        $data['tipo_luoghi'] = $luogo->get_tipo_luoghi();
        $data['dinastia'] = [];
        $data['personaggi'] = personaggio::orderBy('cognome', 'ASC')->get();
        $data['eventi'] = evento::orderBy('denominazione_evento', 'ASC')->get();
        $data['tipo_eventi'] = evento::orderBy('tipo_evento', 'ASC')->get();

        return view('insert_evento')->with('data', $data);
    }


    private function validate_evento(Request $request)
    {
        $this->validate($request, [
            'denominazione_evento' => 'required|max:25',
            'tipo_evento' => 'required|max:25',

        ]);
    }

    public function insert_evento(Request $request)
    {


        $this->validate_evento($request);
        $evento = new evento();


        $evento->denominazione_evento = $request['denominazione_evento'];
        $evento->anno_evento = $request['anno_costruzione'] == null ? null : $request['anno_costruzione'];
        $evento->tipo_evento = $request['tipo_evento'];
        $evento->tipo_sub_evento = $request['tipo_sub_evento'];

        $evento->descrizione_evento = $request['descrizione_evento'];
        $evento->origine_luogo_id = $request['denominazione_luogo'] == null ? null : $request['denominazione_luogo'];
        $evento->nuovo_luogo_id = $request['nuovo_luogo_id'] == null ? null : $request['nuovo_luogo_id'];

        $evento->ulteriore_caratterizzazione = $request['ulteriore_caratterizzazione'];
        $evento->descrizione_movimento_opera = $request['descrizione_movimento_opera'];


        $evento->save();

        $evento2 = evento::where('denominazione_evento', '=', $request['denominazione_evento'])->firstOrFail();

        $personaggi_ass = [];
        for ($i = 0; $i < count($request['personaggi']); $i++) {
            $id_pers = substr($request['personaggi'][$i], 12);
            array_push($personaggi_ass, $id_pers);
        }

        $evento->personaggi()->attach($personaggi_ass);

        return $personaggi_ass;


    }

    public function get_sub_eventi(Request $request)
    {
        $evento = new evento();

        return $evento->get_sub_eventi($request['tipo_evento']);
    }

    public function update(Request $request)
    {

        $this->validate_evento($request);



        $evento = evento::find($request['id']);

        $evento->denominazione_evento = $request['denominazione_evento'];
        $evento->tipo_evento = $request['tipo_evento'];
        $evento->anno_evento = $request['anno_costruzione'] == null ? null : $request['anno_costruzione'];
        $evento->tipo_sub_evento = $request['tipo_sub_evento'];
        $evento->descrizione_evento = $request['descrizione_evento'];
        $evento->origine_luogo_id = $request['denominazione_luogo'] == null ? null : $request['denominazione_luogo'];
        $evento->nuovo_luogo_id = $request['nuovo_luogo_id'] == null ? null : $request['nuovo_luogo_id'];
        $evento->ulteriore_caratterizzazione = $request['ulteriore_caratterizzazione'];

        $evento->descrizione_movimento_opera = $request['descrizione_movimento_opera'];

        $evento->save();

        $persnaggi_ass = [];
        for ($i = 0; $i < count($request['personaggi']); $i++) {
            $id_pers = substr($request['personaggi'][$i], 12);
            array_push($persnaggi_ass, $id_pers);
        }

        $evento->personaggi()->sync($persnaggi_ass);

        return $evento;

    }
}
