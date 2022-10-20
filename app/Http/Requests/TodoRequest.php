<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
            'content' => 'required|string|max:20'
        ];
    }
    public function messages()
    {
        return [
            'content.max' => '20文字以内で入力してください',
            'content.required' => 'Todoの内容を入力してください'


        ];
    }
}
