<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DealerRequest extends Request
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
        'name_of_company'=>'required|min:3',
        'address'=>'required|min:3',
        'agricultural_expertise'=>'required|min:3',
        'contact_person'=>'required|min:3',
        'company_email'=>'required|email',
        'person_email'=>'required|email',
        'company_phone'=>'required|numeric',
        'person_phone'=>'required|numeric',
        'years_in_business'=>'required',
        'company_tin'=>'required',
        'bvn'=>'required',
        'account_number'=>'required',
        'account_name'=>'required',
        'file'=>'required',
        'file1'=>'required',
        ];
    }
}
