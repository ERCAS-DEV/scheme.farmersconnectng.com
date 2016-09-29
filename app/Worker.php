<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'first_name',
    	'middle_name',
    	'last_name',
    	'date_of_birth',
    	'gender',
    	'email',
    	'phone',
    	'type_of_residence',
    	'marital_status',
    	'education',
    	'employment',
    	'address',
    	'lga',
    	'state',
    	'bvn',
    	'account_number',
    	'account_name',
    	'key',
        'token',
        'assign',
        'scheme_id'
    ];

    //one to many relation with schem
    public function scheme()
    {
      return $this->belongsTo('App\Scheme');
    }
}
