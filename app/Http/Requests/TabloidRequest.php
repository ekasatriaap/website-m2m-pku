<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TabloidRequest extends FormRequest
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
            "title" => "required|string|max:255",
            "description" => "string|nullable",
            "file" => "required|file|mimes:pdf,jpg,png,jpeg|max:2048",
        ];
    }

    public function attributes()
    {
        return [
            "title" => "Judul",
            "description" => "Deskripsi",
            "file" => "File",
        ];
    }
}
