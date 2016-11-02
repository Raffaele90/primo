<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dinastia extends Model
{
    public $timestamps = false;
    protected $table = 'dinastia';

    protected $fillable = ['personaggio_id','nome_dinastia','padre_id','madre_id','coniuge1_id','coniuge2_id','coniuge3_id'];

}
