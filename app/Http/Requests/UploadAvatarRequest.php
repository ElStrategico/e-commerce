<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadAvatarRequest extends FormRequest
{
    public function messages()
    {
        return [
            'avatar.image' => 'Некорректный формат файла',
            'avatar.mimes' => 'Некорректный формат файла'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }

}
