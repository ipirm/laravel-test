<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculateSum extends FormRequest
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
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first.numeric'         => 'Первое значение должно числом',
            'second.numeric'        => 'Второе значение быть числом',
            'first.digits_between'  => 'Первое число должно быть не более 255 значным и не менее 0',
            'second.digits_between' => 'Второе число должно быть не более 255 значным и не менее 0',
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
            'first'  => 'numeric|digits_between:0,255|nullable',
            'second' => 'numeric|digits_between:0,255|nullable',
        ];
    }
}
