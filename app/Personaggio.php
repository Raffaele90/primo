<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personaggio extends Model
{
    public $timestamps = false;


    protected $table = 'personaggio';

    protected $fillable = [
        'nome', 'cognome', 'data_nascita', 'luogo_nascita', 'data_morte', 'luogo_morte', 'descrizione', 'tipo','nome_dinastia','padre_id','madre_id','coniuge1_id','coniuge2_id','coniuge3_id','dinastia'];

    public function eventi()
    {
        return $this->belongsToMany('App\evento', 'evento_personaggio', 'personaggio_id', 'evento_id');
    }
    public function luoghi()
    {
        return $this->hasOne('App\luogo');
    }


}
