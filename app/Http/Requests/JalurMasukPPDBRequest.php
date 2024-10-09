<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JalurMasukPPDBRequest extends FormRequest
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
            "nama_jalur" => "required|string|max:255",
            "description" => "nullable|string",
            "persyaratan" => "nullable|string",
        ];
    }

    public function attributes(): array
    {
        return [
            "nama_jalur" => "Nama Jalur",
            "description" => "Deskripsi",
            "persyaratan" => "Persyaratan",
        ];
    }
}
