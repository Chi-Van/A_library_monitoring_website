<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublishingCompanyRequest extends FormRequest
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
            'pc_name' => 'required | max:191',
            'pc_email' => 'required | max:191 |unique:publishing_company,pc_email,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'pc_name.required' => 'The name field is required.',
            'pc_name.max' => 'The name may not be greater than 191 characters.',
            'pc_email.required' => 'The email field is required.',
            'pc_email.max' => 'The email may not be greater than 191 characters.',
            'pc_email.unique' => 'The email has already been taken.',
        ];
    }
}
