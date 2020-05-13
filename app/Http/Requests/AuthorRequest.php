<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'at_name' => 'required | max:191',
            'at_email' => 'required | max:191 |unique:authors,at_email,'.$this->id,
            'at_gender' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'at_name.required' => 'The name field is required.',
            'at_name.max' => 'The name may not be greater than 191 characters.',
            'at_email.required' => 'The email field is required.',
            'at_email.max' => 'The email may not be greater than 191 characters.',
            'at_email.unique' => 'The email has already been taken.',
            'at_gender.required' => 'The gender field is required.',
        ];
    }
}
