<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListingContactFormRequest extends FormRequest
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
            'message' => 'required|min:3|max:100',
        ];
    }

    public function messages()
    {
        return [
            'message.required' => 'You need to enter a message',
            'message.min'       =>  'Message must be at least 3 characteres long',
            'message.max'       =>  'Message exceeds maximum count.'
        ];
    }
}
