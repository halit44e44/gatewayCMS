<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentMethodRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $rules = [
            'percent' => 'numeric',
            'maxValue' => 'numeric',
            'minValue' => 'numeric',
            'controlValue' => 'numeric',


            // 'status'=>true,
        ];

        $id = ($this->get('id')) ? $this->get('id') : '';

        // if($id){
        //     $rules['title']= 'required|unique:companies,id,'.$id;   
        // }

        return $rules;
    }
}
