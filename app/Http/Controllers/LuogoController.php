<?php

namespace App\Http\Controllers;

use App\evento;
use App\luogo;
use App\Personaggio;

use App\Dinastia;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;


class LuogoController extends Controller
{


    public function get_form_edit()
    {
        $luogo = new luogo();

        $data['luoghi'] = luogo::orderBy('denominazione_luogo', 'ASC')->get();
        $data['tipo_luoghi'] = $luogo->get_tipo_luoghi();
        $data['dinastie'] = Dinastia::distinct()->orderBy('nome_dinastia', 'ASC')->get();
        return view('edit_luogo')->with('data', $data);
    }

    private function validate_luogo($request)
    {
        $this->validate($request, [
            'denominazione_luogo' => 'required|max:25|',
            'localizzazione_luogo' => 'required|max:25',
            'ac_dc' => 'required',
            'regione' => 'required',
            'provincia' => 'required',
            'comune' => 'required',



        ]);
    }

    public function insert_luogo(Request $request)
    {
        $this->validate_luogo($request);

        $luogo = new luogo();


        $luogo->denominazione_luogo = $request['denominazione_luogo'];
        $luogo->anno_costruzione = $request['anno_costruzione'];
        $luogo->descrizione_monumento = $request['descrizione_monumento'];
        $luogo->tipo_luogo = $request['tipo_luogo'];
        $luogo->ulteriore_caratterizzazione = $request['ulteriore_caratterizzazione'];
        $luogo->localizzazione_luogo = $request['localizzazione_luogo'];
        $luogo->tipo_sub_luogo = $request['tipo_sub_luogo'];
        $luogo->ac_dc = $request['ac_dc'];
        $luogo->cap = $request['cap'];
        $luogo->indirizzo = $request['indirizzo'];

        $luogo->regione_id = luogo::get_id_regione($request['regione']);

        $luogo->provincia_id = luogo::get_id_provincia($request['provincia']);

        $luogo->comune_id = luogo::get_id_comune($request['comune']);


        $success = $luogo->save();

        return $luogo;
    }


    public function get_sub_luoghi(Request $request)
    {
        $luogo = new luogo();

        return $luogo->get_sub_luoghi($request['tipo_sub_luogo']);
    }


    public function get_luogo(Request $request)
    {

        $luogo = luogo::find($request['id']);
        $luogo['tipi_luoghi'] = luogo::distinct()->select('tipo_luogo')->whereNotIn('id', [$request['id']])->where('tipo_luogo', '<>', $luogo['tipo_luogo'])->get();
        $luogo['regioni'] = DB::table('regioni')->orderBy("nome", "ASC")->get();
        $luogo['province'] = DB::table('province')->orderBy("nome", "ASC")->where("id_regione", "=", $luogo['regione_id'])->get();

        $luogo['comuni'] = DB::table('comuni')->orderBy("nome", "ASC")->where("id_provincia", "=", $luogo['provincia_id'])->get();

        $luogo['tipi_sub_luoghi'] = luogo::distinct()->select('tipo_sub_luogo')->whereNotIn('id', [$request['id']])->where('tipo_luogo', $luogo['tipo_luogo'])->where('tipo_sub_luogo', '<>', $luogo['tipo_sub_luogo'])->get();
        $luogo['personaggi'] = Personaggio::where('luogo_nascita', '=', $request['id'])->orWhere('luogo_morte', '=', $request['id'])->get();
        $luogo['eventi'] = evento::where('origine_luogo_id', '=', $request['id'])->orWhere('nuovo_luogo_id', '=', $request['id'])->get();
        $luogo['nomi_dinastie'] = luogo::distinct()->select('nome_dinastia')->whereNotIn('id', [$request['id']])->where('nome_dinastia', '<>', $luogo['nome_dinastia'])->get();

        return $luogo;
    }

    public function update(Request $request)
    {

        $this->validate_luogo($request);
        $luogo = luogo::find($request['id']);


        $luogo->denominazione_luogo = $request['denominazione_luogo'];
        $luogo->anno_costruzione = $request['anno_costruzione'];
        $luogo->descrizione_monumento = $request['descrizione_monumento'];
        $luogo->tipo_luogo = $request['tipo_luogo'];
        $luogo->ulteriore_caratterizzazione = $request['ulteriore_caratterizzazione'];
        $luogo->localizzazione_luogo = $request['localizzazione_luogo'];
        $luogo->tipo_sub_luogo = $request['tipo_sub_luogo'];
        $luogo->ac_dc = $request['ac_dc'];
        $luogo->cap = $request['cap'];
        $luogo->indirizzo = $request['indirizzo'];

        $luogo->regione_id = luogo::get_id_regione($request['regione']);

        $luogo->provincia_id = luogo::get_id_provincia($request['provincia']);

        $luogo->comune_id = luogo::get_id_comune($request['comune']);


        $success = $luogo->save();

        return redirect()->back()->with($success, 1);
        //return redirect()->to('edit_luogo')->with($success);
    }


    public function remove_luogo(Request $request)
    {

        $result = luogo::where('id', $request['remove_id'])->delete();

        if ($result) {
            return $request['remove_id'];
        } else {
            return $request['remove_id'];
        }
    }


    public function get_province(Request $request){

        $regione = DB::table('regioni')->select('id')->where("nome", "=", $request['nome_regione'])->get();
        return DB::table('province')->orderBy("nome", "ASC")->where("id_regione", "=", $regione[0]->id)->get();

    }


    public function get_comuni(Request $request){

        $provincia = DB::table('province')->select('id')->where("nome", "=", $request['nome_provincia'])->get();
        return DB::table('comuni')->orderBy("nome", "ASC")->where("id_provincia", "=", $provincia[0]->id)->get();

    }
}
