<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BillRequest extends FormRequest
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
       
        $rules=[
            'gouverne_id'    =>'required',
            'quantity'=>'required|numeric',  
            'product_id'    =>'required',
        ];
      
        return $rules;
    }

    public function messages()
    {
        return [
            'gouverne_id.required' => 'City_Name field is required.',
            'product_id.required' => 'Product_Name field is required.',
        ];
    }
}
