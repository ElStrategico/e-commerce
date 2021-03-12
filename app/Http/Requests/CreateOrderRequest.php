<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    public function messages()
    {
        return [
            'city_id.required'  => 'Город должен быть указан',
            'address.required'  => 'Адрес должен быть указан',
            'phone.required'    => 'Телефон должен быть указан',
            'email.required'    => 'Почта должна быть указана'
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
            'city_id'           => 'required',
            'address'           => 'required',
            'phone'             => 'required',
            'order_positions'   => 'required',
            'email'             => 'required|email',
        ];
    }
}
