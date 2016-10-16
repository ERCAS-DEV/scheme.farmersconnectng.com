<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    //
    protected $fillable=[
    'key',
    'fullname',
    'gender',
    'email',
    'phone',
    'state',
    'lga',
    'village',
    'farm_size',
    'no_of_pack',
    'used_before',
    'bank',
    'account_no',
    'image',
    'crop'
    ];
//many to many relationship with crops
    public function crops(){
        return $this->belongsToMany('App\Crop');
    }

//many to many relationship scheme
    public function schemes(){
        return $this->belongsToMany('App\Scheme');
    }

    //many to many relationship group
        public function groups(){
            return $this->belongsToMany('App\Group');
        }
}
