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
            "setting.name" => "string|max:255",
            "setting.alias" => "string|max:255",
            "setting.description" => "string",
            "setting.tagline" => "string|max:255",
            "setting.footer_credit" => "string|max:255",
            "setting.address" => "string|max:255",
            "setting.postcode" => "numeric|digits:5",
            "setting.phone" => "numeric|digits_between:10,15",
            "setting.whatsapp" => "numeric|digits_between:10,15",
            "setting.email" => "email|max:255",
            "setting.facebook" => "string|max:255",
            "setting.instagram" => "string|max:255",
            "setting.twitter" => "string|max:255",
            "setting.youtube" => "string|max:255",
            "setting.longitude" => "string|max:255",
            "setting.latitude" => "string|max:255",
            "logo" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "page_header" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "favicon" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ];
    }

    public function attributes(): array
    {
        return [
            "setting.name" => "Nama",
            "setting.alias" => "Alias",
            "setting.description" => "Deskripsi",
            "setting.tagline" => "Tagline",
            "setting.footer_credit" => "Credit",
            "setting.address" => "Alamat",
            "setting.postcode" => "Kode Pos",
            "setting.phone" => "Telepon",
            "setting.whatsapp" => "Whatsapp",
            "setting.email" => "Email",
            "setting.facebook" => "Facebook",
            "setting.instagram" => "Instagram",
            "setting.twitter" => "Twitter",
            "setting.youtube" => "Youtube",
            "setting.longitude" => "Longitude",
            "setting.latitude" => "Latitude",
            "logo" => "Logo",
            "favicon" => "Favicon",
            "page_header" => "Header Halaman",
        ];
    }
}
