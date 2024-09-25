<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            "title" => "string|max:255" . ($this->input("status") != 'draft' ? '|required' : ''),
            "slug" => "string|max:255|unique:news,slug," . ($id ?? '') . ($this->input("status") != 'draft' ? '|required' : ''),
            "content" => ($this->input("status") != 'draft' ? '|required' : ''),
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "id_bidang" => (!accountIsAdmin() ? "required|exists:bidangs,id" : ''),
            "status" => (!accountIsAdmin() ? "required|string|in:publish,draft,submission,reject" : '')
        ];
    }

    public function attributes(): array
    {
        return [
            "title" => "Judul",
            "slug" => "Slug",
            "content" => "Content",
            "image" => "Image",
            "id_bidang" => "Bidang",
            "status" => "Status",
        ];
    }
}
