<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    protected $fillable = array('nom','description','annee','mois','ID_proprietaire');
}
