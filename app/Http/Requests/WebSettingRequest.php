<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebSettingRequest extends FormRequest
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
            "setting.name" => "required|string|max:255",
            "setting.description" => "required|string",
            "setting.tagline" => "required|string|max:255",
            "setting.address" => "required|string|max:255",
            "setting.postcode" => "required|numeric|digits:5",
            "setting.phone" => "required|numeric|digits_between:10,15",
            "setting.email" => "required|email|max:255",
            "setting.facebook" => "required|string|max:255",
            "setting.instagram" => "required|string|max:255",
            "setting.twitter" => "required|string|max:255",
            "setting.youtube" => "required|string|max:255",
            "setting.longitude" => "required|string|max:255",
            "setting.latitude" => "required|string|max:255",
            "logo" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "favicon" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ];
    }

    public function attributes(): array
    {
        return [
            "setting.name" => "Nama",
            "setting.description" => "Deskripsi",
            "setting.tagline" => "Tagline",
            "setting.address" => "Alamat",
            "setting.postcode" => "Kode Pos",
            "setting.phone" => "Telepon",
            "setting.email" => "Email",
            "setting.facebook" => "Facebook",
            "setting.instagram" => "Instagram",
            "setting.twitter" => "Twitter",
            "setting.youtube" => "Youtube",
            "setting.longitude" => "Longitude",
            "setting.latitude" => "Latitude",
            "logo" => "Logo",
            "favicon" => "Favicon",
        ];
    }
}
