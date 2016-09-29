<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class WorkerRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        'first_name'=>'required|min:3',
        'middle_name'=>'required|min:3',
        'last_name'=>'required|min:3',
        'date_of_birth'=>'required|date_format:Y/m/d',
        'gender'=>'required',
        'email'=>'required|email',
        'phone'=>'required|numeric',
        'lga'=>'required',
        'state'=>'required',
        'bvn'=>'required',
        'account_number'=>'required|numeric',
        'account_name'=>'required'
        ];

    }

    //many to many relationship with worker
    public function schemes(){
        return $this->belongsToMany('App\Scheme');
    }
}
