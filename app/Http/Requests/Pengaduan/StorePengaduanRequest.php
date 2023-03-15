<?php

namespace App\Http\Requests\Pengaduan;

use Illuminate\Foundation\Http\FormRequest;

class StorePengaduanRequest extends FormRequest
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
            'kategori_pengaduan_id' => ['required', 'integer'],
            'judul_pengaduan' => ['required', 'string', 'max:255'],
            'isi_pengaduan' => ['required', 'string'],
            'tanggal_kejadian' => ['required', 'date'],
            'lokasi_kejadian' => ['required', 'string'],
            'bukti_foto' => ['image', 'max:10000', 'mimes:jpg,png,jpeg,svg'],
        ];
    }
}
