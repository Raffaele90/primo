<?php

namespace App\Http\Controllers;

use App\evento;
use App\luogo;
use App\Personaggio;
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

        return view('edit_luogo')->with('data', $data);
    }

    public function insert_luogo(Request $request)
    {

        $luogo = new luogo();


        $luogo->denominazione_luogo = $request['denominazione_luogo'];
        $luogo->anno_costruzione = $request['anno_costruzione'];
        $luogo->descrizione_monumento = $request['descrizione_monumento'];
        $luogo->tipo_luogo = $request['tipo_luogo'];
        $luogo->ulteriore_caratterizzazione = $request['ulteriore_caratterizzazione'];
        $luogo->localizzazione_luogo = $request['localizzazione_luogo'];
        $luogo->tipo_sub_luogo = $request['tipo_sub_luogo'];

        $luogo->save();

        return $luogo;
    }


    public function prova()
    {
        return DB::table('luogo')->select('tipo_luogo')->distinct()->get();
    }

    public function get_sub_luoghi(Request $request)
    {
        $luogo = new luogo();

        return $luogo->get_sub_luoghi($request['tipo_sub_luogo']);
    }


    public function get_luogo(Request $request)
    {

        $luogo = luogo::find($request['id']);
        $luogo['personaggi'] = Personaggio::all();
        $luogo['eventi'] = evento::all();

        return $luogo;
    }
}
