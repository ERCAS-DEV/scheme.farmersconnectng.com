<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    //
    protected $fillable=[
    'key',
    'name_of_company',
    'company_email',
    'company_phone',
    'address',
    'website',
    'contact_person',
    'person_phone',
    'person_email',
    'agricultural_expertise',
    'years_in_business',
    'similar_project',
    'references',
    'company_tin',
    'bvn',
    'account_number',
    'account_name',
    'token',
    'logo',
    'image'
    ];

    //many to many relationship with scheme
    public function schemes(){
        return $this->belongsToMany('App\Scheme');
    }

    //many to many relationship with activity
    public function activities(){
        return $this->belongsToMany('App\Activity');
    }


        //many to many relationship with activity
    public function groups(){
        return $this->belongsToMany('App\Group');
    }

    //one to many relation with billing
    public function billings()
    {
      return $this->hasMany('App\Billing');
  }
}
