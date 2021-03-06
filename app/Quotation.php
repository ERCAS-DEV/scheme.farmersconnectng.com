<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    //
    protected $fillable=[
    'key',
    'activity',
    'quantity',
    'description',
    'payment_range'
    ];

    //one to many relationship with scheme
    public function scheme()
    {
        return $this->belongsTo('App\Scheme');
    }

    //one to many relationship with feedback
    public function feedback()
    {
        return $this->hasMany('App\Feedback');
    }

    public function billings()
    {
        return $this->hasMany('App\Billing');
    }

}
