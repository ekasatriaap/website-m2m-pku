<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => "required|string|max:255",
            'username' => "required|string|max:255|unique:users,username," . ($id ?? ''),
            'email' => "required|string|email|max:255|unique:users,email," . ($id ?? ''),
            'level' => "required|string|in:" . implode(',', array_keys(LEVEL_USER)),
            'id_bidang' => $this->input('level') === 'admin' ? 'required|exists:bidangs,id' : 'nullable',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nama',
            'username' => 'Username',
            'email' => 'Email',
            'level' => 'Level',
            'id_bidang' => 'Bidang',
        ];
    }
}
