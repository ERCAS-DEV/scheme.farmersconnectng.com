<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
    protected $fillable = [
    'price',
    'bvn',
    'account_number',
    'account_name',
    'feedback_key'
    ];

    //one to many relationship with quotation
    public function quotation()
    {
    	return $this->belongsTo('App\Quotation');
    }

    //one to many relation with delaer
    public function dealer()
    {
        return $this->belongsTo('App\Dealer');
    }
}
