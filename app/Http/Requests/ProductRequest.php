<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'price' => 'required|numeric|between:0.01,99999.99',
            'quantity' => 'required|integer',
        ];
    }

    public function messages()
{
    return [
        'name.required' => 'O campo nome é obrigatório.',
        'price.required' => 'O campo preço é obrigatório.',
        'price.numeric' => 'O campo preço precisa ser numérico.',
        'quantity.required' => 'O campo quantidade é obrigatório.',
    ];
}

}
