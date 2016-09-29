<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FarmersRequest extends Request
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
        'fullname'=>'required|min:3',
        'phone'=>'required|numeric',
        'gender'=>'required',
        'state'=>'required',
        'lga'=>'required',
        'village'=>'required',
        'farm_size'=>'required|numeric',
        'bank'=>'required',
        'account_no'=>'required|numeric'
        ];
    }
}
