<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dinastia extends Model
{
    public $timestamps = false;
    protected $table = 'dinastia';

    protected $fillable = ['nome_dinastia'];


    public function eventi()
    {
        return $this->belongsToMany('App\evento', 'dinastia_evento', 'dinastia_id', 'evento_id')
            ->withPivot('dal', 'ac_dc_1', 'al', 'ac_dc_2');
    }

    public function personaggi()
    {
        return $this->belongsToMany('App\Personaggio', 'dinastia_personaggio', 'dinastia_id', 'personaggio_id')
            ->withPivot('parent_id');
    }
}
