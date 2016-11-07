<?php

namespace App\Http\Controllers;

use App\evento;
use App\luogo;
use App\Personaggio;

use Hamcrest\Core\Set;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;


class PersonaggioController extends Controller
{

    public function getForm()
    {
        $luogo = new luogo();

        $data['luoghi'] = luogo::orderBy('denominazione_luogo', 'ASC')->get();
        $data['tipo_luoghi'] = $luogo->get_tipo_luoghi();
        $data['dinastia'] = [];
        $data['personaggi'] = personaggio::orderBy('cognome', 'ASC')->get();
        $data['eventi'] = evento::orderBy('tipo_evento', 'ASC')->get();
        $data['tipo_eventi'] = evento::orderBy('tipo_evento', 'ASC')->get();

        return view('insert_personaggio')->with('data', $data);
    }

    public function get_form_edit()
    {
        $luogo = new luogo();

        $data['luoghi'] = luogo::orderBy('denominazione_luogo', 'ASC')->get();
        $data['tipo_luoghi'] = $luogo->get_tipo_luoghi();
        $data['dinastia'] = [];
        $data['personaggi'] = personaggio::orderBy('cognome', 'ASC')->get();
        $data['eventi'] = evento::orderBy('tipo_evento', 'ASC')->get();
        $data['tipo_eventi'] = evento::orderBy('tipo_evento', 'ASC')->get();

        $data['personaggi'] = personaggio::orderBy('cognome', 'ASC')->get();
        return view('edit_personaggio')->with('data', $data);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'nome' => 'required|max:25|',
            'cognome' => 'required|max:25',

        ]);

        $personaggio = new Personaggio();
        $personaggio->nome = $request['nome'];
        $personaggio->cognome = $request['cognome'];
        $personaggio->luogo_nascita = $request['luogo_nascita'];
        $personaggio->data_nascita = $request['data_nascita'];
        $personaggio->data_morte = $request['data_morte'];
        $personaggio->luogo_morte = $request['luogo_morte'];
        $personaggio->descrizione = $request['descrizione'];
        $personaggio->nome_dinastia = $request['nome_dinastia'];
        $personaggio->padre_id = $request['padre'];
        $personaggio->madre_id = $request['madre'];
        $personaggio->coniuge1_id = $request['coniuge1'];
        $personaggio->coniuge2_id = $request['coniuge2'];
        $personaggio->coniuge3_id = $request['coniuge3'];
        $personaggio->tipo = $request['tipo'];

        $personaggio->save();
        return redirect()->action('PersonaggioController@getForm');
    }


    public function get_personaggio(Request $request)

    {
        $pers['eventi_associati'] = Personaggio::find($request['id'])->eventi()->get();

        $arr = [];
        for ($i = 0; $i < count($pers['eventi_associati']); $i++) {
            array_push($arr, $pers['eventi_associati'][$i]['id']);

        }
        $pers['eventi_non_associati'] = evento::whereNotIn('id', $arr)->get()->toArray();
        $pers['anagrafica'] = Personaggio::find($request['id']);

        $pers['dinastia'] = [];

        $cont = 0;
        $padre = $pers['anagrafica']['padre_id'];
        $madre = $pers['anagrafica']['madre_id'];
        $pers['dinastia'][$cont]['padre'] = Personaggio::find($padre);
        $pers['dinastia'][$cont]['madre'] = Personaggio::find($madre);
        while (1) {
            if ($padre != null or $madre != null) {
                $padre = Personaggio::find($padre)['padre_id'];
                $madre = Personaggio::find($madre)['madre_id'];
                $cont += 1;
                $pers['dinastia'][$cont]['padre'] = Personaggio::find($padre);
                $pers['dinastia'][$cont]['madre'] = Personaggio::find($madre);

            } else {
                break;
            }
        }
        $pers['luogo_nascita'] = luogo::find($pers['anagrafica']['luogo_nascita']);
        $pers['luogo_morte'] = luogo::find($pers['anagrafica']['luogo_morte']);

        return  $pers;//Personaggio::join('luogo', 'luogo.idLuogo', '=', 'personaggio.luogo_nascita')->where('personaggio.id','=',$request['id'])->get();


    }
}
