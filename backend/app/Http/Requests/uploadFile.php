<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class uploadFile extends FormRequest
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
            'file' => 'required|mimes:jpeg,png,jpg|max:2048',
            'model_id' => 'required|integer'
        ];
    }
}