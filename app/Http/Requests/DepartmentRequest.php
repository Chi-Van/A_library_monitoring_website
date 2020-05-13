<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'd_name' => 'required | max:191'
        ];
    }

    public function messages()
    {
        return [
            'd_name.required' => 'The name field is required.',
            'd_name.max' => 'The name may not be greater than 191 characters.',
        ];
    }
}
