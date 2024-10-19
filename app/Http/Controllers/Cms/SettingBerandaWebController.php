<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingBerandaWebRequest;
use App\Models\SettingBerandaWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingBerandaWebController extends Controller
{
    protected $view = "cms.setting-beranda-web";

    public function edit()
    {
        $data = [
            "title" => "Setting Beranda Web",
            "settings" => SettingBerandaWeb::get()->keyBy('param')
        ];
        return view($this->view . ".edit", $data);
    }

    public function update(SettingBerandaWebRequest $request)
    {
        DB::beginTransaction();
        try {
            if ($request->hasFile('section_1_image')) {
                $file = $request->file('section_1_image');
                $upload_section_1_image  = uploadFile($file, 'setting-beranda-web');
                $sec = SettingBerandaWeb::where('param', 'sec')->get()->first();
                if (!empty($sec->value)) {
                    deleteFile($sec->value);
                }
                SettingBerandaWeb::where('param', 'section_1_image')->update(['value' => $upload_section_1_image['file']]);
            }
            if ($request->hasFile('section_2_image')) {
                $file = $request->file('section_2_image');
                $upload_section_2_image = uploadFile($file, 'setting-beranda-web');
                $section_2_image = SettingBerandaWeb::where('param', 'section_2_image')->get()->first();
                if (!empty($section_2_image->value)) {
                    deleteFile($section_2_image->value);
                }
                SettingBerandaWeb::where('param', 'section_2_image')->update(['value' => $upload_section_2_image['file']]);
            }
            if ($request->hasFile('section_2_foto')) {
                $file = $request->file('section_2_foto');
                $upload_section_2_foto = uploadFile($file, 'setting-beranda-web');
                $section_2_foto = SettingBerandaWeb::where('param', 'section_2_foto')->get()->first();
                if (!empty($section_2_foto->value)) {
                    deleteFile($section_2_foto->value);
                }
                SettingBerandaWeb::where('param', 'section_2_foto')->update(['value' => $upload_section_2_foto['file']]);
            }
            if ($request->hasFile('section_3_image')) {
                $file = $request->file('section_3_image');
                $upload_section_3_image = uploadFile($file, 'setting-beranda-web');
                $section_3_image = SettingBerandaWeb::where('param', 'section_3_image')->get()->first();
                if (!empty($section_3_image->value)) {
                    deleteFile($section_3_image->value);
                }
                SettingBerandaWeb::where('param', 'section_3_image')->update(['value' => $upload_section_3_image['file']]);
            }
            if ($request->hasFile('section_4_image')) {
                $file = $request->file('section_4_image');
                $upload_section_4_image = uploadFile($file, 'setting-beranda-web');
                $section_4_image = SettingBerandaWeb::where('param', 'section_4_image')->get()->first();
                if (!empty($section_4_image->value)) {
                    deleteFile($section_4_image->value);
                }
                SettingBerandaWeb::where('param', 'section_4_image')->update(['value' => $upload_section_4_image['file']]);
            }
            foreach ($request->post("setting") as $key => $item) {
                SettingBerandaWeb::where('param', $key)->update(['value' => $item]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('sweet_error', GAGAL_SIMPAN);
        }
        DB::commit();
        return redirect()->back()->with('sweet_success', BERHASIL_SIMPAN);
    }
}
