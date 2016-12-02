<?php

namespace App\Http\Controllers;

use App\evento;
use Illuminate\Http\Request;
use App\luogo;
use App\Personaggio;
use Illuminate\Support\Facades\DB;


use App\Http\Requests;


class EventoController extends Controller

{


    public function get_evento(Request $request)
    {
        $modal_evento = new evento();
        $evento = evento::find($request['id']);
        $evento['tipo_sub_eventi'] = $modal_evento->get_sub_eventi($evento['tipo_evento']);

        $evento['tipo_eventi'] = $this->get_eventi();
        $origine_luogo = null;
        $nuovo_luogo = null;
        if ($evento['origine_luogo_id'] != null and $evento['origine_luogo_id'] != "")
            $origine_luogo = luogo::find($evento['origine_luogo_id']);

        if ($evento['nuovo_luogo_id'] != null and $evento['nuovo_luogo_id'] != "")
            $nuovo_luogo = luogo::find($evento['nuovo_luogo_id']);

        $evento['nuovo_luogo'] = $nuovo_luogo['denominazione_luogo'];
        $evento['vecchio_luogo'] = $origine_luogo['denominazione_luogo'];


        $evento['personaggi_associati'] = DB::table('evento_personaggio')->where('evento_id', '=', $request["id"])->pluck('personaggio_id');//evento::find($request['id'])->personaggi()->get();

        $arr = $evento['personaggi_associati'];

        $evento['personaggi_associati'] = Personaggio::findMany($evento['personaggi_associati']);
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
        $data['tipo_eventi'] = evento::distinct()->select('tipo_evento')->orderBy('tipo_evento', 'ASC')->get();

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
        $data['tipo_eventi'] = evento::distinct()->select('tipo_evento')->orderBy('tipo_evento', 'ASC')->get();

        return view('insert_evento')->with('data', $data);
    }


    private function validate_evento(Request $request)
    {
        $this->validate($request, [
            'denominazione_evento' => 'required',
            'tipo_evento' => 'required|max:25',

        ]);
    }

    public function insert_evento(Request $request)
    {

        $this->validate_evento($request);
        $evento = new evento();


        $evento->denominazione_evento = $request['denominazione_evento'];
        $evento->data_evento = $request['data_costruzione'] == null ? null : $request['data_costruzione'];
        $evento->tipo_evento = $request['tipo_evento'];
        $evento->tipo_sub_evento = $request['tipo_sub_evento'];

        $evento->descrizione_evento = $request['descrizione_evento'];
        $evento->origine_luogo_id = $request['origine_luogo_id'] == null ? null : $request['origine_luogo_id'];
        $evento->nuovo_luogo_id = $request['nuovo_luogo_id_evento'] == null ? null : $request['nuovo_luogo_id_evento'];

        $evento->ulteriore_caratterizzazione = $request['ulteriore_caratterizzazione_evento'];
        $evento->descrizione_movimento_opera = $request['descrizione_movimento_opera'];


        $evento->save();

        $evento2 = evento::where('denominazione_evento', '=', $request['denominazione_evento'])->firstOrFail();

        $personaggi_ass = [];
        for ($i = 0; $i < count($request['personaggi']); $i++) {
            $id_pers = substr($request['personaggi'][$i], 12);
            array_push($personaggi_ass, $id_pers);
        }

        $evento->personaggi()->attach($personaggi_ass);

        if ($request->ajax()) {
            return $evento;
        } else {

            return redirect('insert_evento')->with("success", "suc"); //$personaggi_ass;

        }

    }

    public function get_sub_eventi(Request $request)
    {
        $evento = new evento();
        $tipo_evento = $request['tipo_evento'];
        return $evento->get_sub_eventi($tipo_evento);
    }

    public function get_eventi()
    {

        return DB::table('evento')->select('tipo_evento')->distinct()->orderBy('tipo_evento', 'ASC')->get();
    }


    public function update(Request $request)
    {

        $this->validate_evento($request);


        $evento = evento::find($request['id']);

        $evento->denominazione_evento = $request['denominazione_evento'];
        $evento->tipo_evento = $request['tipo_evento'];
        $evento->data_evento = $request['data_costruzione'] == null ? null : $request['data_costruzione'];
        $evento->tipo_sub_evento = $request['tipo_sub_evento'];
        $evento->descrizione_evento = $request['descrizione_evento'];
        $evento->origine_luogo_id = $request['origine_luogo_id'] == null ? null : $request['origine_luogo_id'];
        $evento->nuovo_luogo_id = $request['nuovo_luogo_id_evento'] == null ? null : $request['nuovo_luogo_id_evento'];
        $evento->ulteriore_caratterizzazione = $request['ulteriore_caratterizzazione_evento'];

        $evento->descrizione_movimento_opera = $request['descrizione_movimento_opera'];

        $evento->save();

        $persnaggi_ass = [];
        for ($i = 0; $i < count($request['personaggi']); $i++) {
            $id_pers = substr($request['personaggi'][$i], 12);
            array_push($persnaggi_ass, $id_pers);
        }

        $evento->personaggi()->sync($persnaggi_ass);
        return redirect('edit_evento')->with("success", "suc");

    }


    public function remove_evento(Request $request)
    {
        $result = evento::where('id', $request['remove_id'])->delete();

        if ($result) {
            return $request['remove_id'];
        } else {
            return $request['remove_id'];
        }
    }

}
