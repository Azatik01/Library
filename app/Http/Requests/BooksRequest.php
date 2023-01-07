<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BooksRequest extends FormRequest
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
     * @return array<strinpictureg, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:250'],
            'picture' => ['image'],
            'description' => ['max:2000', "not_regex:([?:\"[^\"]*\"['\"]*|'[^']*'['\"]*|[^'\">]])", 'nullable'],
            'author_id' => ['nullable'],
            'genre_id' => ['required'],
            'price' => ['required', '']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Наименование должно быть заполнено',
            'name.max' => 'Наименование не должно превышать 250 символов',
            'picture.image' => 'Загрузка только изображений',
            'genre_id.required' => 'Жанр должен быть выбран',
            'description.max' => 'Описание не должно превышать 2000 символов',
            'price.required' => 'Цена должна быть заполнена'
        ];
    }
}
