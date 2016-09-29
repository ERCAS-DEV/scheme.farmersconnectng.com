<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $fillable = ['name', 'key'];


//many to many with scheme
    public function schemes(){
        return $this->belongsToMany('App\Scheme');
    }

 //many to many with dealer
     public function dealers(){
         return $this->belongsToMany('App\Dealer');
     }
}
