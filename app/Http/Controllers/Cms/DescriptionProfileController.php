<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\DescriptionProfileRequest;
use App\Models\DescriptionProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DescriptionProfileController extends Controller
{
    protected $view = "cms.description-profile";

    public function edit()
    {
        $data = [
            "title" => "Deskripsi Profile",
            "settings" => DescriptionProfile::get()->keyBy('param')
        ];
        return view($this->view . ".edit", $data);
    }

    public function update(DescriptionProfileRequest $request)
    {
        DB::beginTransaction();
        try {
            if ($request->hasFile('image_madrasah')) {
                $file = $request->file('image_madrasah');
                $upload_image_madrasah = uploadFile($file, 'description-profile');
                $image_madrasah = DescriptionProfile::where('param', 'image_madrasah')->get()->first();
                if ($image_madrasah->value) {
                    deleteFile($image_madrasah->value);
                }
                DescriptionProfile::where('param', 'image_madrasah')->update(['value' => $upload_image_madrasah['file']]);
            }
            if ($request->hasFile('image_komite')) {
                $file = $request->file('image_komite');
                $upload_image_komite = uploadFile($file, 'description-profile');
                $image_komite = DescriptionProfile::where('param', 'image_komite')->get()->first();
                if ($image_komite->value) {
                    deleteFile($image_komite->value);
                }
                DescriptionProfile::where('param', 'image_komite')->update(['value' => $upload_image_komite['file']]);
            }
            if ($request->hasFile('image_struktural')) {
                $file = $request->file('image_struktural');
                $upload_image_struktural = uploadFile($file, 'description-profile');
                $image_struktural = DescriptionProfile::where('param', 'image_struktural')->get()->first();
                if ($image_struktural->value) {
                    deleteFile($image_struktural->value);
                }
                DescriptionProfile::where('param', 'image_struktural')->update(['value' => $upload_image_struktural['file']]);
            }
            foreach ($request->post("setting") as $key => $item) {
                DescriptionProfile::where('param', $key)->update(['value' => $item]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('sweet_error', GAGAL_SIMPAN);
        }
        DB::commit();
        return redirect()->back()->with('sweet_success', BERHASIL_SIMPAN);
    }
}
