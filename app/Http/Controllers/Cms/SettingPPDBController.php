<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingPPDBRequest;
use App\Models\SettingPPDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingPPDBController extends Controller
{
    protected $view = "cms.setting-ppdb";

    public function edit()
    {
        $data = [
            "title" => "Setting PPDB",
            "settings" => SettingPPDB::all()->keyBy("param")
        ];
        return view($this->view . ".edit", $data);
    }

    public function update(SettingPPDBRequest $request)
    {
        DB::beginTransaction();
        try {
            if ($request->hasFile('main_image')) {
                $file = $request->file('main_image');
                $upload_main_image = uploadFile($file, 'informasi-ppdb');
                $main_image = SettingPPDB::where('param', 'main_image')->get()->first();
                if (!empty($main_image->value)) {
                    deleteFile($main_image->value);
                }
                SettingPPDB::where('param', 'main_image')->update(['value' => $upload_main_image['file']]);
            }
            if ($request->hasFile('syarat_umum_image')) {
                $file = $request->file('syarat_umum_image');
                $upload_syarat_umum_image = uploadFile($file, 'informasi-ppdb');
                $syarat_umum_image = SettingPPDB::where('param', 'syarat_umum_image')->get()->first();
                if (!empty($syarat_umum_image->value)) {
                    deleteFile($syarat_umum_image->value);
                }
                SettingPPDB::where('param', 'syarat_umum_image')->update(['value' => $upload_syarat_umum_image['file']]);
            }
            if ($request->hasFile('jalur_masuk_image')) {
                $file = $request->file('jalur_masuk_image');
                $upload_jalur_masuk_image = uploadFile($file, 'informasi-ppdb');
                $jalur_masuk_image = SettingPPDB::where('param', 'jalur_masuk_image')->get()->first();
                if (!empty($jalur_masuk_image->value)) {
                    deleteFile($jalur_masuk_image->value);
                }
                SettingPPDB::where('param', 'jalur_masuk_image')->update(['value' => $upload_jalur_masuk_image['file']]);
            }
            foreach ($request->post("setting") as $key => $item) {
                SettingPPDB::where('param', $key)->update(['value' => $item]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("sweet_error", GAGAL_SIMPAN);
        }
        DB::commit();
        return redirect()->back()->with("sweet_success", BERHASIL_SIMPAN);
    }
}
