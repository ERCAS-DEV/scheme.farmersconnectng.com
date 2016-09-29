<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    //
    protected $fillable =[
    'price',
    'bvn',
    'account_number',
    'account_name'
    ];

    //one to many relation with dealer
    public function dealer()
    {
      return $this->belongsTo('App\Dealer');
    }
}
