<?php

namespace App\Http\Requests\Tanggapan;

use Illuminate\Foundation\Http\FormRequest;

class StoreTanggapanRequest extends FormRequest
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
            'isi_tanggapan' => ['required', 'string'],
            'tanggal_tanggapan' => ['required', 'date'],
        ];
    }
}
