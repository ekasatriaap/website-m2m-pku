<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingPPDBRequest extends FormRequest
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
            "setting.main_title" => "required|string|max:255",
            "setting.main_description" => "required|string",
            "main_image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "setting.syarat_umum_decription" => "required|string",
            "syarat_umum_image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "jalur_masuk_image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ];
    }

    public function attributes(): array
    {
        return [
            "setting.main_title" => "Judul Utama",
            "setting.main_description" => "Deskripsi Utama",
            "main_image" => "Gambar Utama",
            "setting.syarat_umum_decription" => "Deskripsi Syarat Umum",
            "syarat_umum_image" => "Gambar Syarat Umum",
            "jalur_masuk_image" => "Gambar Jalur Masuk",
        ];
    }
}
