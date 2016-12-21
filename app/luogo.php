<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class luogo extends Model
{

    public $timestamps = false;


    protected $table = 'luogo';

    protected $fillable = [
        'denominazione_luogo', 'anno_costruzione', 'descrizione_monumento', 'localizzazione_luogo', 'tipo_luogo', 'ulteriore_caratterizzazione', 'tipo_sub_luogo', 'ac_dc', 'regione_id', 'provincia_id', 'comune_id', 'indirizzo', 'cap'];


    public function get_tipo_luoghi()
    {
        return DB::table('luogo')->select('tipo_luogo')->distinct()->orderBy('tipo_luogo', 'ASC')->get();
    }

    public function get_sub_luoghi($tipo_luogo)
    {
        return DB::table('luogo')->select('tipo_sub_luogo')->distinct()->orderBy('tipo_sub_luogo', 'ASC')->where('tipo_luogo', '=', $tipo_luogo)->get();
    }

    public static function get_id_regione($nome_regione)
    {
        $regione = DB::table('regioni')->select('id')->where("nome", "=", $nome_regione)->get();
        return $regione[0]->id;

    }

    public static function get_id_provincia($nome_provincia)
    {
        $provincia = DB::table('province')->select('id')->where("nome", "=", $nome_provincia)->get();
        return $provincia[0]->id;

    }

    public static function get_id_comune($nome_comune)
    {
        $comune = DB::table('comuni')->select('id')->where("nome", "=", $nome_comune)->get();
        return $comune[0]->id;

    }
}
