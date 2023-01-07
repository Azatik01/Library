<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenresRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:100'],
            'picture' => ['image', 'nullable'],
            'description' => ['max:1000', 'nullable', "not_regex:([?:\"[^\"]*\"['\"]*|'[^']*'['\"]*|[^'\">]])"]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Наименование должно быть заполнено  ',
            'name.max' => 'Наименование не должно превышать 100 символов',
            'picture.image' => 'Загрузка только изображений',
            'description.max' => 'Описание не должно превышать 1000 символов'
        ];
    }
}
