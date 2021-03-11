<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
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
            'cpf' => 'required|max:11',
            'email' => 'required|email',
            'gender_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'A code is required',

            'name.required' => 'A name is required',
            'name.max' => 'A can has max 45 caracteres',

            'cpf.required' => 'A cpf is required',
            'cpf.max' => 'A cpf can has max 11 caracteres',

            'email.required' => 'A email is required',
            'email.email' => 'Email address is not valid',

            'gender_id.required' => 'A gender is required',
        ];
    }
}
