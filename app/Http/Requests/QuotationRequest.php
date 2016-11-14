<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class QuotationRequest extends Request
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
        'activity' => 'required',
        'quantity' => 'required|numeric',
        'description' =>'required|min:5',
        'payment_range' => 'required'
        ];
    }
}
