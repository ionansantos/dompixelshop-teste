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
            'price' => 'required|integer',
            'quantity' => 'required|integer',
        ];
    }

    public function messages()
{
    return [
        'name.required' => 'O campo nome é obrigatório.',
        'price.required' => 'O campo preço é obrigatório.',
        'quantity.required' => 'O campo quantidade é obrigatório.',
    ];
}

}