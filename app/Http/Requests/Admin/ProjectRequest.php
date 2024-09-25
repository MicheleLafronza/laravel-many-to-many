<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'client' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'titolo obbligatorio',
            'title.min' => 'minimo lunghezza tre caratteri',
            'description.required' => 'descrizione obbligatorio',
            'description.min' => 'minimo lunghezza tre caratteri',
            'client.required' => 'cliente obbligatorio',
            'client.min' => 'minimo lunghezza tre caratteri'

        ];
    }
}
