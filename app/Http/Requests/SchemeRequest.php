<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SchemeRequest extends Request
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
        'name_of_scheme'=>'required|min:3',
        'facilitator_of_scheme'=>'required|min:3',
        'discription_of_scheme'=>'required|min:3',
        'facilitator_name'=>'required|min:3',
        'address'=>'required|min:3',
        'bvn'=>'required|min:3',
        'partners_of_scheme'=>'required|min:3',
        'objective_of_scheme'=>'required|min:3',
        'tin'=>'required|min:3',
        'nature_of_bussiness'=>'required|min:3',
        'email'=>'required|email',
        'phone'=>'required|numeric',
        'activity'=>'required',
        ];
    }
}
