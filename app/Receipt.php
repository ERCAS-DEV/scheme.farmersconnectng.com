<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    //
    protected $fillable=[
    'farmer_key',
    'scheme_key',
    'activity_key',
    'discription_of_scheme',
    'worker_key',
    'dealer_key'
    ];
}
