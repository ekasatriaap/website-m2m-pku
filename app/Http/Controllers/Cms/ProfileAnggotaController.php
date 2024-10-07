<?php

namespace App\Http\Controllers\Cms;

use App\DataTables\ProfileAnggotaDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileAnggotaRequest;
use App\Models\Madrasah;
use App\Models\ProfileAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileAnggotaController extends Controller
{
    protected $view = "cms.profile-anggota.";

    public function index(ProfileAnggotaDataTable $datatable)
    {
        $data = [
            "title" => "Profile Anggota"
        ];
        return $datatable->render($this->view . "index", $data);
    }

    public function create()
    {
        notAjaxAbort();
        $data = [
            "title" => "Tambah Profile Anggota",
            "profile_anggota" => new ProfileAnggota(),
            "jenis_profile" => collect(JENIS_PROFILE)
        ];
        return view($this->view . "create", $data);
    }

    public function store(ProfileAnggotaRequest $request)
    {
        notAjaxAbort();
        DB::beginTransaction();
        try {
            $data = $request->validated();
            if ($request->hasFile("image")) {
                $file = $request->file("image");
                $upload_file = uploadFile($file, "profile_anggota");
                $data["image"] = $upload_file["file"];
            }
            ProfileAnggota::create($data);
        } catch (\Exception $th) {
            DB::rollBack();
            return responseFail(GAGAL_SIMPAN);
        }
        DB::commit();
        return responseSuccess(BERHASIL_SIMPAN);
    }

    public function edit($id)
    {
        notAjaxAbort();
        $id = decode($id);
        $profile_anggota = ProfileAnggota::findOrFail($id);
        $data = [
            "title" => "Edit Profle Anggota",
            "profile_anggota" => $profile_anggota,
            "jenis_profile" => collect(JENIS_PROFILE)
        ];
        return view($this->view . "edit", $data);
    }

    public function update(ProfileAnggotaRequest $request, $id)
    {
        notAjaxAbort();
        $id = decode($id);
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $profile_anggota = ProfileAnggota::findOrFail($id);
            if ($request->hasFile("image")) {
                $file = $request->file("image");
                $upload_file = uploadFile($file, "profile_anggota");
                $data["image"] = $upload_file["file"];
                if ($profile_anggota->image) {
                    deleteFile($profile_anggota->image);
                }
            }
            $profile_anggota->update($data);
        } catch (\Exception $th) {
            DB::rollBack();
            return responseFail(GAGAL_SIMPAN);
        }
        DB::commit();
        return responseSuccess(BERHASIL_SIMPAN);
    }

    public function show($id)
    {
        notAjaxAbort();
        $id = decode($id);
        $profile_anggota = ProfileAnggota::findOrFail($id);
        $data = [
            "title" => "Detail Profile Anggota",
            "profile_anggota" => $profile_anggota
        ];
        return view($this->view . "show", $data);
    }
    public function destroy($id)
    {
        notAjaxAbort();
        $id = decode($id);
        DB::beginTransaction();
        try {
            $profile_anggota = ProfileAnggota::findOrFail($id);
            if ($profile_anggota->image) {
                deleteFile($profile_anggota->image);
            }
            $profile_anggota->delete();
        } catch (\Exception $th) {
            DB::rollBack();
            return responseFail(GAGAL_HAPUS);
        }
        DB::commit();
        return responseSuccess(BERHASIL_HAPUS);
    }
}
