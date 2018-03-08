<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeam extends FormRequest
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
            'picture' => 'file|image|max:9024',
            'name' => 'required',
            'profession' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'picture.file' => 'Ошибка при загрузке файла',
            'picture.image'  => 'Неверный формат файла',
            'picture.max' => 'Этот файл слишком большой',
            'name.required' => 'Поле нужно заполнить',
            'profession.required'  => 'Поле нужно заполнить',
        ];
    }
}
