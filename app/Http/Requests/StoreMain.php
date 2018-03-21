<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMain extends FormRequest
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
            'title' => 'required',
            'news' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'picture.file' => 'Ошибка при загрузке файла',
            'picture.image'  => 'Неверный формат файла',
            'picture.max' => 'Этот файл слишком большой',
            'title.required' => 'Поле нужно заполнить',
            'news.required'  => 'Поле нужно заполнить',
        ];
    }
}
