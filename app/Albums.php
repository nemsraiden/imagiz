<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    protected $fillable = array('nom','description','albums_id');

    public function pictures(){
        return $this->hasMany('App\Pictures');
    }
}
