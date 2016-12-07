<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class luogo extends Model
{

    public $timestamps = false;


    protected $table = 'luogo';

    protected $fillable = [
        'denominazione_luogo', 'anno_costruzione', 'descrizione_monumento', 'localizzazione_luogo', 'tipo_luogo', 'ulteriore_caratterizzazione', 'tipo_sub_luogo','nome_dinastia','ac_dc','attuale_destinazione'];


    public function get_tipo_luoghi()
    {
        return DB::table('luogo')->select('tipo_luogo')->distinct()->orderBy('tipo_luogo', 'ASC')->get();
    }

    public function get_sub_luoghi($tipo_luogo)
    {
        return DB::table('luogo')->select('tipo_sub_luogo')->distinct()->orderBy('tipo_sub_luogo', 'ASC')->where('tipo_luogo', '=', $tipo_luogo)->get();
    }
}
