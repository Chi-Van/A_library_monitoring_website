<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'b_name' => 'required | max:191 ',
            'author' => 'required',
            'b_categories_id' => 'required',
            'b_publishing_company_id' => 'required',
            'b_code_book' => 'required|max:10|unique:books,b_code_book,'.$this->id,

        ];
    }

    public function messages()
    {
        return [
            'b_name.required' => 'The name field is required.',
            'b_name.max' => 'The name may not be greater than 191 characters.',
            'author.required' => 'The author field is required.',
            'b_categories_id.required' => 'The categories field is required.',
            'b_publishing_company_id.required' => 'The publishing company field is required.',
            'b_code_book.required' => 'The code book field is required.',
            'b_code_book.unique' => 'The code book has already been taken.',
        ];
    }
}
