<?php

namespace App\Http\Controllers;

use App\evento;
use App\luogo;
use App\Personaggio;
use App\Dinastia;

use Hamcrest\Core\Set;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator;


class PersonaggioController extends Controller
{

    public function getForm()
    {
        $luogo = new luogo();

        $data['luoghi'] = luogo::orderBy('denominazione_luogo', 'ASC')->get();
        $data['tipo_luoghi'] = $luogo->get_tipo_luoghi();
        $data['dinastia'] = Dinastia::distinct()->orderBy('nome_dinastia', 'ASC')->get();//Personaggio::select('nome_dinastia')->where('nome_dinastia', '<>', 'null')->distinct()->orderBy('nome_dinastia', 'ASC')->get();
        $data['dinastie'] = Dinastia::distinct()->orderBy('nome_dinastia', 'ASC')->get();//Personaggio::select('nome_dinastia')->where('nome_dinastia', '<>', 'null')->distinct()->orderBy('nome_dinastia', 'ASC')->get();
        $data['personaggi'] = Personaggio::orderBy('cognome', 'ASC')->get();
        $data['eventi'] = evento::orderBy('tipo_evento', 'ASC')->get();
        $data['tipo_eventi'] = evento::distinct()->select('tipo_evento')->orderBy('tipo_evento', 'ASC')->get();

        $data['regioni'] = DB::table('regioni')->orderBy('nome', 'ASC')->get();
        return view('insert_personaggio')->with('data', $data);
    }

    public function get_form_edit()
    {
        $luogo = new luogo();

        $data['luoghi'] = luogo::orderBy('denominazione_luogo', 'ASC')->get();
        $data['tipo_luoghi'] = $luogo->get_tipo_luoghi();
        $data['dinastia'] = Dinastia::distinct()->orderBy('nome_dinastia', 'ASC')->get();//Personaggio::select('nome_dinastia')->where('nome_dinastia', '<>', 'null')->distinct()->orderBy('nome_dinastia', 'ASC')->get();
        $data['dinastie'] = Dinastia::distinct()->orderBy('nome_dinastia', 'ASC')->get();//Personaggio::select('nome_dinastia')->where('nome_dinastia', '<>', 'null')->distinct()->orderBy('nome_dinastia', 'ASC')->get();

        $data['personaggi'] = Personaggio::orderBy('cognome', 'ASC')->get();
        $data['eventi'] = evento::orderBy('tipo_evento', 'ASC')->get();
        $data['tipo_eventi'] = evento::distinct()->select('tipo_evento')->orderBy('tipo_evento', 'ASC')->get();
        $data['regioni'] = DB::table('regioni')->orderBy('nome', 'ASC')->get();

        return view('edit_personaggio')->with('data', $data);
    }

    private function validate_personaggio($request)
    {

        $this->validate($request, [
            'nome' => 'required|max:25',
            'cognome' => 'required|max:25',
            'data_nascita' => 'required'//|checkPersonaggio:'.$request["nome"].','.$request["cognome"]


            //'padre_id' => 'isDescendant:'.$request['id']

        ]);
    }

    private function get_info($request)
    {
        $personaggio = new Personaggio();
        $personaggio->nome = $request['nome'];
        $personaggio->cognome = $request['cognome'];
        $personaggio->luogo_nascita = $request['luogo_nascita'];
        $personaggio->data_nascita = $request['data_nascita'] == "" ? null : $request['data_nascita'];
        $personaggio->data_morte = $request['data_morte'] == "" ? null : $request['data_morte'];
        $personaggio->luogo_morte = $request['luogo_morte'];
        $personaggio->descrizione = $request['descrizione'];
        $personaggio->nome_dinastia = $request['nome_dinastia'];
        $personaggio->padre_id = $request['padre'] == null ? null : $request['padre'];
        $personaggio->madre_id = $request['madre'] == null ? null : $request['madre'];
        $personaggio->coniuge1_id = $request['coniuge1'] == null ? null : $request['coniuge1'];
        $personaggio->coniuge2_id = $request['coniuge2'] == null ? null : $request['coniuge2'];
        $personaggio->coniuge3_id = $request['coniuge3'] == null ? null : $request['coniuge3'];
        $personaggio->tipo = $request['tipo'];


        return $personaggio;
    }


    public function store(Request $request)
    {
        $this->validate_personaggio($request);
        $personaggio = $this->get_info($request);
        $personaggio->save();

        //Ass DINASTIA a personaggio
        //Analizzo la dinastia se non la trovo nella tab dinastia la devo inserire
        for ($i = 0; $i < count($request['dinastia_personaggio']); $i++) {
            $dinastia = Dinastia::where('nome_dinastia', '=', $request['dinastia_personaggio'][$i])->first();
            if ($dinastia === null) {
                $dinastia = new Dinastia();
                $dinastia->nome_dinastia = $request['dinastia_personaggio'][$i];
                $dinastia->save();
            }
            if ($request['predecessore_id'][$i] != "undefined" and $request['predecessore_id'][$i] != "") {
                $personaggio->dinastie()->attach([$dinastia->id => ['parent_id' => $request['predecessore_id'][$i]]]);

            } else {
                $personaggio->dinastie()->attach($dinastia->id);

            }
        }

        //ASS eventi a personaggio
        $eventi_ass = [];
        for ($i = 0; $i < count($request['eventi']); $i++) {
            $id_evento = substr($request['eventi'][$i], 7);
            array_push($eventi_ass, $id_evento);
        }
        $personaggio->eventi()->sync($eventi_ass);

        if ($request->ajax()) {
            return $personaggio;
        } else {

            return redirect('insert_personaggio')->with("success", "as");
        }

    }


    public function update(Request $request)
    {

        //dd($request);

        $this->validate_personaggio($request);

        $personaggio = Personaggio::find($request['id']);

        $personaggio->nome = $request['nome'];
        $personaggio->cognome = $request['cognome'];
        $personaggio->luogo_nascita = $request['luogo_nascita'];
        $personaggio->data_nascita = $request['data_nascita'] == "" ? null : $request['data_nascita'];
        $personaggio->data_morte = $request['data_morte'] == "" ? null : $request['data_morte'];
        $personaggio->luogo_morte = $request['luogo_morte'];
        $personaggio->descrizione = $request['descrizione'];
        $personaggio->nome_dinastia = $request['nome_dinastia'];
        $personaggio->padre_id = $request['padre'] == null ? null : $request['padre'];
        $personaggio->madre_id = $request['madre'] == null ? null : $request['madre'];
        $personaggio->coniuge1_id = $request['coniuge1'] == null ? null : $request['coniuge1'];
        $personaggio->coniuge2_id = $request['coniuge2'] == null ? null : $request['coniuge2'];
        $personaggio->coniuge3_id = $request['coniuge3'] == null ? null : $request['coniuge3'];
        $personaggio->tipo = $request['tipo'];


        $personaggio->save();

        $eventi_ass = [];
        for ($i = 0; $i < count($request['eventi']); $i++) {
            $id_evento = substr($request['eventi'][$i], 7);
            array_push($eventi_ass, $id_evento);
        }
        $personaggio->eventi()->sync($eventi_ass);

        return redirect('edit_personaggio')->with("success", "suc");

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
        $pers['dinastie_ass'] = Personaggio::find($request['id'])->dinastie()->get(); //Trovo tutte le dinastie associate al personaggio

        for ($i = 0; $i < count($pers['dinastie_ass']); $i++) {
            $parent_id = $pers['dinastie_ass'][$i]['pivot']['parent_id'];
            $parent = Personaggio::find($parent_id);
            $pers['dinastie_ass'][$i]['pivot']['nome_parent'] = $parent['cognome'] . " " . $parent['nome'];
            $pers['dinastie_ass'][$i]['pivot']['nome_parent'] = trim($pers['dinastie_ass'][$i]['pivot']['nome_parent']); //Carico il nome e cogn del padre nella stessa posizione dove trovo l'id

        }

        //dd($pers['dinastie_ass'][0]['pivot']['parent_id']);
        $pers['dinastie'] = Personaggio::distinct()->select('nome_dinastia')->get();

        $pers['dinastia'] = [];

        $cont = 0;
        $padre = $this->check($pers['anagrafica']['padre_id']);
        $madre = $this->check($pers['anagrafica']['madre_id']);
        $coniuge1 = $this->check($pers['anagrafica']['coniuge1_id']);
        $coniuge2 = $this->check($pers['anagrafica']['coniuge2_id']);
        $coniuge3 = $this->check($pers['anagrafica']['coniuge3_id']);

        $pers['dinastia']['padre'] = Personaggio::find($padre);
        $pers['dinastia']['madre'] = Personaggio::find($madre);
        $pers['dinastia']['coniuge1'] = Personaggio::find($coniuge1);

        $pers['dinastia']['coniuge2'] = Personaggio::find($coniuge2);

        $pers['dinastia']['coniuge3'] = Personaggio::find($coniuge3);

        $ids_famiglia = [];
        array_push($ids_famiglia, $pers['anagrafica']['id']);
        if ($padre != "" and $padre != null)
            array_push($ids_famiglia, $padre);

        if ($madre != "" and $madre != null)
            array_push($ids_famiglia, $madre);

        if ($coniuge1 != "" and $coniuge1 != null)
            array_push($ids_famiglia, $coniuge1);

        if ($coniuge2 != "" and $coniuge2 != null)
            array_push($ids_famiglia, $coniuge2);

        if ($coniuge3 != "" and $coniuge3 != null)
            array_push($ids_famiglia, $coniuge3);

        $pers['personaggi'] = Personaggio::whereNotIn('id', $ids_famiglia)->orderBy("cognome", "ASC")->get();

        $pers['luogo_nascita'] = "";
        $pers['luogo_morte'] = "";
        $pers['luogo_nascita'] = luogo::find($pers['anagrafica']['luogo_nascita']);
        $pers['luogo_morte'] = luogo::find($pers['anagrafica']['luogo_morte']);

        return $pers;

    }


    public function get_dinastia(Request $request)
    {

        //dd($request);

        if ($request['id'] != null and $request['id'] != "") { // Se la dinastia è stata richiesta nella edit oppure non ha un padre associato nella dinastia


            $personaggio = Personaggio::find($request['id']);
            $id_pers = $request['id'];

            if (isset($request['nuovo_id_padre'])) {
                $id_padre = $request['padre_id'];
                $nome = $request['nome'];
                $cognome = $request['cognome'];
            } else {
                $id_padre = $personaggio['padre_id'];
                $nome = $personaggio['nome'];
                $cognome = $personaggio['cognome'];
            }

        } else { // Se la dinastia è stata richiesta nella insert
            $id_pers = "-1";
            $nome = $request['nome'];
            $cognome = $request['cognome'];

            $id_padre = $request['padre_id'];

        }

        $json_dinastia = "{\"class\": \"go.TreeModel\",\"nodeDataArray\":[";
        $padre = Personaggio::find($id_padre);

        if ($id_padre == null or $id_padre == "" or $id_padre == -1) {

            $json_dinastia .= "{\"key\":\"" . $id_pers . "\", \"name\" :\"" . $cognome . " " . $nome . "\", \"title\": \"padre\"}]}";
            return ($json_dinastia);
        } else {

            $json_dinastia .= "{\"key\":\"" . $id_pers . "\", \"name\" :\"" . $cognome . ' ' . $nome . "\", \"title\": \"padre\", \"parent\":\"" . $id_padre . "\"},";

        }
        while ($padre['id'] != null and $padre['id'] != "") {

            $fratelli = Personaggio::where('padre_id', '=', $id_padre)->get();

            foreach ($fratelli as $fratello) {
                if ($fratello['id'] != $request['id']) {
                    $json_dinastia .= "{\"key\":\"" . $fratello['id'] . "\", \"name\" :\"" . $fratello['cognome'] . " " . $fratello['nome'] . "\", \"title\": \"padre\", \"parent\":\"" . $fratello['padre_id'] . "\"},";

                }
            }
            $id = $padre['id'];
            $cognome = $padre['cognome'];
            $nome = $padre['nome'];
            $id_padre = $padre['padre_id'];
            $padre = Personaggio::find($id_padre);

        }

        $json_dinastia .= "{\"key\":\"" . $id . "\", \"name\" :\"" . $cognome . " " . $nome . "\", \"title\": \"padre\"}]}";


        return ($json_dinastia);
    }


    public function remove_personaggio(Request $request)
    {

        $result = Personaggio::where('id', $request['remove_id'])->delete();

        if ($result) {
            return $request['remove_id'];
        } else {
            return $request['remove_id'];
        }
    }


    private function check($value)
    {
        if ($value == null or $value == "") {
            return null;
        }
        return $value;
    }
}
