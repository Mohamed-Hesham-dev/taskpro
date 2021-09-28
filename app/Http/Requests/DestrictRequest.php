<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DestrictRequest extends FormRequest
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
            'name'=>'required|string|max:255|regex:/^([a-zA-Z])(\s[a-zA-Z])/',
            'gouverne_id'    =>['required',
            Rule::unique('districts')->where(function ($query)  {
                return $query->where('name', $this->name)
                   ->where('gouverne_id', $this->gouverne_id);
                  
             })
            ]
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'gouverne_id.required' => 'City_Name field is required.',
        ];
    }

}
