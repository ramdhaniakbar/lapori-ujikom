<?php

namespace App\Http\Requests\Petugas;

use Illuminate\Foundation\Http\FormRequest;

class StorePetugasRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:petugas,email', 'max:255'],
            'password' => ['required', 'min:8', 'string', 'max:255'],
            'role' => ['required', 'string']
        ];
    }
}
