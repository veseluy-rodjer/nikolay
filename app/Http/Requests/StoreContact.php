<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContact extends FormRequest
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
            'name' => 'required',
            'email' => 'email',
            'subject' => 'required',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле нужно заполнить',
            'email.email'  => 'Введите корректный эл. адрес',
            'subject.required'  => 'Поле нужно заполнить',
            'message.required'  => 'Поле нужно заполнить',
        ];
    }
}
