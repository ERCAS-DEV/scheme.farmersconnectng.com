<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $fillable = [
    'group_name',
    'key'
    ];

    //many to many relationship with scheme
    public function schemes(){
        return $this->belongsToMany('App\Scheme');
    }

    //many to many relationship with farmer
    public function farmers(){
        return $this->belongsToMany('App\Farmer');
    }
}
