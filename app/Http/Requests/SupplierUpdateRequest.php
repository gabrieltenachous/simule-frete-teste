<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:20',
            'contact_email' => 'required|email|max:255|unique:suppliers,contact_email,' . $this->id,
            'zip_code' => 'nullable|string|max:20',
            'street' => 'nullable|string|max:255',
            'complement' => 'nullable|string|max:255',
            'neighborhood' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:50',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'contact_phone.required' => 'O telefone é obrigatório.',
            'contact_phone.max' => 'O telefone de contato não deve ter mais que 20 caracteres.',
            'contact_email.email' => 'O campo email deve ser um endereço de email válido.',
            'contact_email.unique' => 'O campo email já existe.',
            'contact_email.required' => 'O campo é obrigatório.',
            'zip_code.max' => 'O código postal não deve ter mais que 20 caracteres.',
            'street.max' => 'A rua não deve ter mais que 255 caracteres.',
            'complement.max' => 'O complemento não deve ter mais que 255 caracteres.',
            'neighborhood.max' => 'O bairro não deve ter mais que 255 caracteres.',
            'city.max' => 'A cidade não deve ter mais que 255 caracteres.',
            'state.max' => 'O estado não deve ter mais que 255 caracteres.',
            'number.max' => 'O número não deve ter mais que 50 caracteres.',
        ];
    }
}
