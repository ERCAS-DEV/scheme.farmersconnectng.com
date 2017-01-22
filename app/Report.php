<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $fillable=[
    'key',
    'key_farmer',
    'key_worker',
    'key_scheme',
    'key_activity',
    'key_group',
    'description',
    'image'
    ];

    //many to many relationship with group
    public function groups(){
        return $this->belongsToMany('App\Group');
    }
}
