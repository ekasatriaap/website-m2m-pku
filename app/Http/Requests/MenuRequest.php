<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
    public function rules($id = null): array
    {
        return [
            "nama_menu" => "required|string|max:255",
            "type" => "required|in:" . implode(",", array_keys(TYPE_MENU)),
            "icon" => "nullable",
            "target" => "required:in:" . implode(",", array_keys(TARGET_MENU))
        ];
    }

    public function attributes()
    {
        return [
            "nama_menu" => "Nama Menu",
            "type" => "Type",
            "url" => "URL",
            "icon" => "Icon",
            "target" => "Target"
        ];
    }
}
