<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimoniRequest extends FormRequest
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
            "testimoni" => "required|string",
            "angkatan" => "required|string|max:4",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ];
    }

    public function attributes(): array
    {
        return [
            "name" => "Nama",
            "testimoni" => "Testimoni",
            "angkatan" => "Angkatan",
            "image" => "Gambar",
        ];
    }
}
