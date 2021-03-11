<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'code' => 'required',
            'name' => 'required|max:45',
            'color' => 'max:20',
            'price' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'A code is required',
            'name.required' => 'A name is required',
            'name.max' => 'A can has max 45 caracteres',
            'color.max' => 'A cpf can has max 20 caracteres',
            'price.required' => 'A price is required',
        ];
    }
}
