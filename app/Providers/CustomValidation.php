<?php
/**
 * Created by PhpStorm.
 * User: raffaeleschiavone
 * Date: 28/11/16
 * Time: 01:21
 */

namespace App\Providers;

use App\Personaggio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\ServiceProvider;


class CustomValidation extends ServiceProvider {

    public function boot()
    {
      /*  Validator::extend('isDescendant', function ($attribute, $value, $parameters)
        {

            $id_ipotetico_padre = $value;
            $personaggio = Personaggio::find($parameters[0]);

            return $this->isDiscendente($id_ipotetico_padre,$personaggio);
        });*/

        Validator::extend('checkPersonaggio', function ($attribute, $value, $parameters)
        {
            $data_nascuta = $value;
            $nome = $parameters[0];
            $cognome = $parameters[1];

            $pers = Personaggio::where("cognome","=",$cognome)->where("nome","=",$nome)->where("data_nascita","=",$data_nascuta)->get();

            if ( count($pers) == 0) return true;

            return false;
        });
    }

    /**
     * Validazione quando si cerca di inserire un padre ma esso è presente già come discendente del personaggio selezionato
     * @param id
     * @param Personaggio $
     * @return bool
     */
    private function isDiscendente($id,$personaggio){
        if ($personaggio['id'] == $id) return false;

        if (! $this->hasChildren($personaggio)) return true;

        $figli = Personaggio::where('padre_id','=',$personaggio['id'])->get();

        foreach ($figli as $figlio){
             if (! $this->isDiscendente($id,$figlio)) return false;
        }

        return true;
    }

    private function hasChildren($personaggio){
        $figli = Personaggio::where('padre_id','=',$personaggio['id'])->get();
        if (count($figli) > 0){
            return true;
        }
        else{
            return false;
        }
    }
    public function register()
    {
        //
    }
}