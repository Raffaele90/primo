<?php

namespace App\Http\Controllers;

use App\luogo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;


class LuogoController extends Controller
{

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


    public function prova(){
        return DB::table('luogo')->select('tipo_luogo')->distinct()->get();
    }

    public function get_sub_luoghi(Request $request){
        $luogo = new luogo();

        return $luogo->get_sub_luoghi($request['tipo_sub_luogo']);
    }
}
