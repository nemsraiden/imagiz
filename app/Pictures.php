<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pictures extends Model
{
    protected $fillable = array('name','directory','annee','mois','ID_proprietaire');

    public function albums(){
        return $this->belongsTo('App\Albums');
    }
}
