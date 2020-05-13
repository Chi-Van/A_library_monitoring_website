<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReaderRequest extends FormRequest
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
            'r_name' => 'required | max:191 ',
            'r_gender' => 'required',
            'r_birthday' => 'required',
            'r_code_card' => 'nullable|max:10|unique:reader,r_code_card,'.$this->id,
            'images' => 'nullable|image|max:9072',
        ];
    }

    public function messages()
    {
        return [
            'r_name.required' => 'The name field is required.',
            'r_name.max' => 'The name may not be greater than 191 characters.',
            'r_gender.required' => 'The gender field is required.',
            'r_birthday.required' => 'The birthday field is required.',
            'r_code_card.required' => 'The code card field is required.',
            'r_code_card.unique' => 'The code card has already been taken.',
        ];
    }
}
