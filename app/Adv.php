<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adv extends Model
{
    public $guarded=[];

    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function site(){
    	return $this->belongsTo('App\Site');
    }
}
