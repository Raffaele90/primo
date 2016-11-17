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
        $data['dinastia'] = Personaggio::select('dinastia')->where('dinastia','<>','null')->orderBy('dinastia', 'ASC')->get();
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
        $data['dinastia'] = Personaggio::select('dinastia')->where('dinastia','<>','null')->orderBy('dinastia', 'ASC')->get();
        $data['personaggi'] = personaggio::orderBy('cognome', 'ASC')->get();
        $data['eventi'] = evento::orderBy('tipo_evento', 'ASC')->get();
        $data['tipo_eventi'] = evento::orderBy('tipo_evento', 'ASC')->get();

        $data['personaggi'] = personaggio::orderBy('cognome', 'ASC')->get();
        return view('edit_personaggio')->with('data', $data);
    }

    private function validate_personaggio($request)
    {
        $this->validate($request, [
            'nome' => 'required|max:25|',
            'cognome' => 'required|max:25',

        ]);
    }

    private function get_info($request)
    {
        $personaggio = new Personaggio();
        $personaggio->nome = $request['nome'];
        $personaggio->cognome = $request['cognome'];
        $personaggio->luogo_nascita = $request['luogo_nascita'];
        $personaggio->data_nascita = $request['data_nascita'];
        $personaggio->data_morte = $request['data_morte'];
        $personaggio->luogo_morte = $request['luogo_morte'];
        $personaggio->descrizione = $request['descrizione'];
        $personaggio->nome_dinastia = $request['nome_dinastia'];
        $personaggio->padre_id =  $request['padre'] == null ? null : $request['padre'];
        $personaggio->madre_id = $request['madre'] == null ? null : $request['madre'];
        $personaggio->coniuge1_id = $request['coniuge1'] == null ? null : $request['coniuge1'];
        $personaggio->coniuge2_id =  $request['coniuge2'] == null ? null : $request['coniuge2'];
        $personaggio->coniuge3_id =  $request['coniuge3'] == null ? null : $request['coniuge3'];
        $personaggio->tipo = $request['tipo'];
        $personaggio->dinastia = $request['dinastia'];


        return $personaggio;
    }


    public function store(Request $request)
    {
        dd($request);
        $this->validate_personaggio($request);
        $personaggio = $this->get_info($request);
        $personaggio->save();

        return redirect()->action('PersonaggioController@getForm');
    }

    public function store_ajax(Request $request)
    {
        $this->validate_personaggio($request);
        $personaggio = $this->get_info($request);
        $personaggio->save();
        return $personaggio;
    }


    public function update(Request $request)
    {

        $this->validate_personaggio($request);

        $personaggio = Personaggio::find($request['id']);

        $personaggio->nome = $request['nome'];
        $personaggio->cognome = $request['cognome'];
        $personaggio->luogo_nascita = $request['luogo_nascita'];
        $personaggio->data_nascita = $request['data_nascita'];
        $personaggio->data_morte = $request['data_morte'];
        $personaggio->luogo_morte = $request['luogo_morte'];
        $personaggio->descrizione = $request['descrizione'];
        $personaggio->nome_dinastia = $request['nome_dinastia'];
        $personaggio->padre_id =  $request['padre'] == null ? null : $request['padre'];
        $personaggio->madre_id = $request['madre'] == null ? null : $request['madre'];
        $personaggio->coniuge1_id = $request['coniuge1'] == null ? null : $request['coniuge1'];
        $personaggio->coniuge2_id =  $request['coniuge2'] == null ? null : $request['coniuge2'];
        $personaggio->coniuge3_id =  $request['coniuge3'] == null ? null : $request['coniuge3'];
        $personaggio->tipo = $request['tipo'];


        $personaggio->save();

        $eventi_ass = [];
        for ($i=0; $i<count($request['eventi']);$i++){
            $id_evento = substr($request['eventi'][$i],7);
            array_push($eventi_ass,$id_evento);
        }

        $personaggio->eventi()->sync($eventi_ass);

        return  $eventi_ass;

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
        $pers['luogo_nascita'] = "";
        $pers['luogo_morte'] = "";
        $pers['luogo_nascita'] = luogo::find($pers['anagrafica']['luogo_nascita']);
        $pers['luogo_morte'] = luogo::find($pers['anagrafica']['luogo_morte']);

        return $pers;//Personaggio::join('luogo', 'luogo.idLuogo', '=', 'personaggio.luogo_nascita')->where('personaggio.id','=',$request['id'])->get();


    }


    public function get_dinastia (Request $request){

        if ($request['id'] != null ) { // Se la dinastia è stata richiesta nella edit


            $personaggio = Personaggio::find($request['id']);
            $id_pers = $request['id'];
            $nome = $personaggio['nome'];
            $cognome = $personaggio['cognome'];

            $id_padre = $personaggio['padre_id'];
        }
        else{ // Se la dinastia è stata richiesta nella insert
            $id_pers = "-1";
            $nome = $request['nome'];
            $cognome = $request['cognome'];
            $id_padre = $request['padre_id'];
        }

        $json_dinastia = "{\"class\": \"go.TreeModel\",\"nodeDataArray\":[";
        $padre = Personaggio::find($id_padre);

        if ($id_padre ==null or $id_padre == ""){

            $json_dinastia .= "{\"key\":\"".$id_pers."\", \"name\" :\"".$cognome."nome:". $nome."\", \"title\": \"padre\"}]}";
            return ($json_dinastia);
        }
        while ($padre['id'] !=null and $padre['id'] != ""){

            $fratelli = Personaggio::where('padre_id','=',$id_padre)->get();
            foreach ($fratelli as $fratello){
                $json_dinastia .= "{\"key\":\"".$fratello['id']."\", \"name\" :\"".$fratello['cognome']." ". $fratello['nome']."\", \"title\": \"padre\", \"parent\":\"".$fratello['padre_id']."\"},";

            }
            $id = $padre['id'];
            $cognome = $padre['cognome'];
            $nome = $padre['nome'];
            $id_padre = $padre['padre_id'];
            $padre = Personaggio::find($id_padre);

        }

        $json_dinastia .= "{\"key\":\"".$id."\", \"name\" :\"".$cognome."nome:". $nome."\", \"title\": \"padre\"}]}";


        return ($json_dinastia);
    }
}
