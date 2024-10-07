<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileAnggotaRequest extends FormRequest
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
            "name" => "required|string|max:255",
            "jabatan" => "required|string|max:255",
            "description" => "nullable|string",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "urutan" => "integer",
            "jenis_profile" => "required|string|in:" . implode(",", array_keys(JENIS_PROFILE)),
        ];
    }

    public function attributes()
    {
        return [
            "name" => "Nama",
            "jabatan" => "Jabatan",
            "description" => "Deskripsi",
            "image" => "Gambar",
            "urutan" => "Urutan",
            "jenis_profile" => "Jenis Profile",
        ];
    }
}
