<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingBerandaWebRequest extends FormRequest
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
            "setting.section_1_title" => "required|string|max:255",
            "setting.section_1_url_video" => "nullable|string|max:255",
            "setting.section_1_description" => "required|string",
            "section_1_image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "setting.section_2_title" => "required|string|max:255",
            "setting.section_2_description" => "required|string",
            "setting.section_2_name" => "required|string|max:255",
            "setting.section_2_jabatan" => "required|string|max:255",
            "section_2_image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "section_2_foto" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "setting.section_3_title" => "required|string|max:255",
            "setting.section_3_description" => "required|string",
            "section_3_image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "setting.section_4_title" => "required|string|max:255",
            "setting.section_4_description" => "required|string",
            "section_4_image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ];
    }

    public function attributes(): array
    {
        return [
            "setting.section_1_title" => "Judul Section 1",
            "setting.section_1_url_video" => "URL Video Section 1",
            "setting.section_1_description" => "Deskripsi Section 1",
            "section_1_image" => "Gambar Section 1",
            "setting.section_2_title" => "Judul Section 2",
            "setting.section_2_description" => "Deskripsi Section 2",
            "setting.section_2_name" => "Nama Section 2",
            "setting.section_2_jabatan" => "Jabatan Section 2",
            "section_2_image" => "Gambar Section 2",
            "section_2_foto" => "Foto Section 2",
            "setting.section_3_title" => "Judul Section 3",
            "setting.section_3_description" => "Deskripsi Section 3",
            "section_3_image" => "Gambar Section 3",
            "setting.section_4_title" => "Judul Section 4",
            "setting.section_4_description" => "Deskripsi Section 4",
            "section_4_image" => "Gambar Section 4",
        ];
    }
}
