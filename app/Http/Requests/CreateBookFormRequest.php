<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookFormRequest extends FormRequest
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
            'title' => 'required|min:3',
            'resume' => 'required|max:500',
            'author' => 'required|max:20',
            'category' =>'required|max:20|alpha',
            
        ];

    }
    // customing message
        public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'title.min' =>'min 3 characters',
        ];
    }
}
