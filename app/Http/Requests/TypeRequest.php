<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|min:2|unique:types,name'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo nome obbligatorio',
            'name.min' => 'Nome minimo di :min caratteri',
            'name.unique' => 'Il campo esiste già'
        ];
    }
}
