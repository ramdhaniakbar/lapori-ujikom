<?php

namespace App\Http\Requests\KategoriPengaduan;

use Illuminate\Foundation\Http\FormRequest;

class StoreKategoriPengaduanRequest extends FormRequest
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
            'nama' => ['required', 'string', 'max:255', 'unique:kategori_pengaduans']
        ];
    }
}
