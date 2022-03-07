<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        $rules = [
            'name' => '',
            'image' => '',
            'hostname' => '',
            'ipn' => '',
            'institutionType' => '',
            'institutionCode' => '',
            'apiKey' => '',
            'secretKey' => '',
            'status' => '',

            // 'status'=>true,
        ];

        $id = ($this->get('id')) ? $this->get('id') : '';

        // if($id){
        //     $rules['title']= 'required|unique:companies,id,'.$id;   
        // }

        return $rules;
    }
}
