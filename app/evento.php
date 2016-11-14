<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class evento extends Model
{
    public $timestamps = false;
    protected $table = 'evento';


    protected $fillable = ['tipo_evento', 'denominazione_evento', 'origine_luogo_id', 'nuovo_luogo_id', 'descrizione_evento', 'anno_evento', 'descrizione_movimento_opera', 'tipo_sub_evento', 'ulteriore_caratterizzazione'];

    public function personaggi()
    {
        return $this->belongsToMany('App\evento', 'evento_personaggio', 'evento_id', 'personaggio_id');

        }

    public function get_sub_eventi($tipo_evento)
    {
        return DB::table('evento')->select('tipo_sub_evento')->distinct()->orderBy('tipo_sub_evento', 'ASC')->where('tipo_evento', '=', $tipo_evento)->get();
    }
}
