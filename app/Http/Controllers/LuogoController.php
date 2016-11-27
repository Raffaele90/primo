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

    private function validate_luogo($request)
    {
        $this->validate($request, [
            'denominazione_luogo' => 'required|max:25|',
            'localizzazione_luogo' => 'required|max:25',

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
        $luogo['personaggi'] = Personaggio::where('luogo_nascita','=',$request['id'])->orWhere('luogo_morte','=',$request['id'])->get();
        $luogo['eventi'] = evento::where('origine_luogo_id','=',$request['id'])->orWhere('nuovo_luogo_id','=',$request['id'])->get();

        return $luogo;
    }

    public function update(Request $request)
    {

        $luogo = luogo::find($request['id']);


        $luogo->denominazione_luogo = $request['denominazione_luogo'];
        $luogo->anno_costruzione = $request['anno_costruzione'];
        $luogo->descrizione_monumento = $request['descrizione_monumento'];
        $luogo->tipo_luogo = $request['tipo_luogo'];
        $luogo->ulteriore_caratterizzazione = $request['ulteriore_caratterizzazione'];
        $luogo->localizzazione_luogo = $request['localizzazione_luogo'];
        $luogo->tipo_sub_luogo = $request['tipo_sub_luogo'];

        $success = $luogo->save();

        return redirect()->back()->with($success, 1);
        //return redirect()->to('edit_luogo')->with($success);
    }




}
