<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SyaratPPDBRequest extends FormRequest
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
            "syarat_name" => "required|string|max:255",
            "description" => "required|string",
            "urutan" => "nullable|integer|min:1",
        ];
    }

    public function attributes(): array
    {
        return [
            "syarat_name" => "Nama Syarat",
            "description" => "Deskripsi",
            "urutan" => "Urutan",
        ];
    }
}
