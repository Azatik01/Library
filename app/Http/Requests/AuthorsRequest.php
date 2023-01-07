<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorsRequest extends FormRequest
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
            'first_name' => ['required', 'max:100', 'string'],
            'last_name' => ['required', 'max:100', 'string'],
            'picture' => ['image'],
            'description' => ['max:2000', "not_regex:([?:\"[^\"]*\"['\"]*|'[^']*'['\"]*|[^'\">]])", 'nullable']
        ];
    }

    public function messages()
    {
        return
            [   'first_name.required' => 'Имя должно быть заполнено',
                'first_name.max' => 'Имя не должно превышать 100 символов',
                'last_name.required' => 'Фамилия должно быть заполнено',
                'last_name.max' => 'Фамилия не должно превышать 100 символов',
                'picture.image' => 'Загрузка только изображений',
                'description.max' => 'Описание не должно превышать 2000 символов'
            ];
    }
}
