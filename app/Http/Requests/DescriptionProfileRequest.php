<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DescriptionProfileRequest extends FormRequest
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
            "setting.description_madrasah" => "required",
            "image_madrasah" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "setting.description_komite" => "required",
            "image_komite" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "setting.description_struktural" => "required",
            "image_struktural" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ];
    }

    public function attributes()
    {
        return [
            "setting.description_madrasah" => "Deskripsi Profile Madrasah",
            "image_madrasah" => "Gambar Profile Madrasah",
            "setting.description_komite" => "Deskripsi Profile Komite",
            "image_komite" => "Gambar Profile Komite",
            "setting.description_struktural" => "Deskripsi Profile Struktural",
            "image_struktural" => "Gambar Profile Struktural",
        ];
    }
}
