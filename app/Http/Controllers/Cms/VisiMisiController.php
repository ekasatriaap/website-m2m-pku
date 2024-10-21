<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\VisiMisiRequest;
use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisiMisiController extends Controller
{
    protected $view = "cms.visi-misi";

    public function edit()
    {
        $data = [
            "title" => "Visi Misi",
            "settings" => VisiMisi::all()->keyBy("param")
        ];

        return view("{$this->view}.edit", $data);
    }

    public function update(VisiMisiRequest $request)
    {
        DB::beginTransaction();
        try {
            if ($request->hasFile("image")) {
                $file = $request->file("image");
                $upload = uploadFile($file, "visi-misi");
                $visi_misi = VisiMisi::where("param", "image")->first();
                if (!empty($visi_misi->value)) {
                    deleteFile($visi_misi->value);
                }
                VisiMisi::where("param", "image")->update(["value" => $upload["file"]]);
            }
            foreach ($request->post("setting") as $key => $value) {
                VisiMisi::where("param", $key)->update(["value" => $value]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("sweet_error", GAGAL_SIMPAN);
        }
        DB::commit();
        return redirect()->back()->with("sweet_success", BERHASIL_SIMPAN);
    }
}
