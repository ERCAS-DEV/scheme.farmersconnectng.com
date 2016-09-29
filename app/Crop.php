<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    //
    protected $fillable =[
    	'crop'
    ];

    public function farmers(){
        return $this->belongsToMany('App\Farmer');
    }
}
