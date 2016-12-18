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


//    private static $regioni = ["Piemonte","Valle d'Aosta","Lombardia","Trentino-Alto Adige","Veneto","Friuli-Venezia Giulia","Liguria","Emilia-Romagna","Toscana","Umbria","Marche","Lazio","Abruzzo","Molise","Campania","Puglia","Basilicata","Calabria","Sicilia","Sardegna"];
//    private static $prov = ["Piemonte","Valle d'Aosta","Lombardia","Trentino-Alto Adige","Veneto","Friuli-Venezia Giulia","Liguria","Emilia-Romagna","Toscana","Umbria","Marche","Lazio","Abruzzo","Molise","Campania","Puglia","Basilicata","Calabria","Sicilia","Sardegna"];
//    private static $regioni = ["Piemonte","Valle d'Aosta","Lombardia","Trentino-Alto Adige","Veneto","Friuli-Venezia Giulia","Liguria","Emilia-Romagna","Toscana","Umbria","Marche","Lazio","Abruzzo","Molise","Campania","Puglia","Basilicata","Calabria","Sicilia","Sardegna"];

    public function get_form_edit()
    {
        $luogo = new luogo();

        $data['luoghi'] = luogo::orderBy('denominazione_luogo', 'ASC')->get();
        $data['tipo_luoghi'] = $luogo->get_tipo_luoghi();
        $data['dinastie'] = Personaggio::distinct()->select('nome_dinastia')->orderBy('nome_dinastia', 'ASC')->get();
        return view('edit_luogo')->with('data', $data);
    }

    private function validate_luogo($request)
    {
        $this->validate($request, [
            'denominazione_luogo' => 'required|max:25|',
            'localizzazione_luogo' => 'required|max:25',
            'ac_dc' => 'required',

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
        $luogo->nome_dinastia = $request['dinastia_appartenenza'];
        $luogo->ac_dc = $request['ac_dc'];
        $luogo->attuale_destinazione = $request['attuale_destinazione'];


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
        $luogo['tipi_sub_luoghi'] = luogo::distinct()->select('tipo_sub_luogo')->whereNotIn('id', [$request['id']])->where('tipo_luogo', $luogo['tipo_luogo'])->where('tipo_sub_luogo', '<>', $luogo['tipo_sub_luogo'])->get();
        $luogo['personaggi'] = Personaggio::where('luogo_nascita', '=', $request['id'])->orWhere('luogo_morte', '=', $request['id'])->get();
        $luogo['eventi'] = evento::where('origine_luogo_id', '=', $request['id'])->orWhere('nuovo_luogo_id', '=', $request['id'])->get();
        $luogo['nomi_dinastie'] = luogo::distinct()->select('nome_dinastia')->whereNotIn('id', [$request['id']])->where('nome_dinastia', '<>', $luogo['nome_dinastia'])->get();
        return $luogo;
    }

    public function update(Request $request)
    {

        //  dd($request);

        $this->validate_luogo($request);
        $luogo = luogo::find($request['id']);


        $luogo->denominazione_luogo = $request['denominazione_luogo'];
        $luogo->anno_costruzione = $request['anno_costruzione'];
        $luogo->descrizione_monumento = $request['descrizione_monumento'];
        $luogo->tipo_luogo = $request['tipo_luogo'];
        $luogo->ulteriore_caratterizzazione = $request['ulteriore_caratterizzazione'];
        $luogo->localizzazione_luogo = $request['localizzazione_luogo'];
        $luogo->tipo_sub_luogo = $request['tipo_sub_luogo'];
        $luogo->nome_dinastia = $request['dinastia_appartenenza'];
        $luogo->ac_dc = $request['ac_dc'];
        $luogo->attuale_destinazione = $request['attuale_destinazione'];

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

}
