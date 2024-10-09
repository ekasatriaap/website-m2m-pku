<?php

namespace App\Http\Controllers\Cms;

use App\DataTables\JalurMasukPPDBDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\JalurMasukPPDBRequest;
use App\Models\JalurMasukPPDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JalurMasukPPDBController extends Controller
{
    protected $view = "cms.jalur-masuk-ppdb";

    public function index(JalurMasukPPDBDataTable $dataTable)
    {
        $data = [
            "title" => "Jalur Masuk PPDB",
        ];
        return $dataTable->render($this->view . ".index", $data);
    }

    public function create()
    {
        notAjaxAbort();
        $data = [
            "title" => "Tambah Jalur Masuk PPDB",
            "jalur_masuk_ppdb" => new JalurMasukPPDB(),
        ];
        return view($this->view . ".create", $data);
    }

    public function store(JalurMasukPPDBRequest $request)
    {
        notAjaxAbort();
        DB::beginTransaction();
        try {
            JalurMasukPPDB::create($request->validated());
        } catch (\Exception $e) {
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
        $data = [
            "title" => "Edit Jalur Masuk PPDB",
            "jalur_masuk_ppdb" => JalurMasukPPDB::findOrFail($id),
        ];
        return view($this->view . ".edit", $data);
    }

    public function update(JalurMasukPPDBRequest $request, $id)
    {
        notAjaxAbort();
        $id = decode($id);
        DB::beginTransaction();
        try {
            JalurMasukPPDB::findOrFail($id)->update($request->validated());
        } catch (\Exception $e) {
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
        $data = [
            "title" => "Detail Jalur Masuk PPDB",
            "jalur_masuk_ppdb" => JalurMasukPPDB::findOrFail($id),
        ];
        return view($this->view . ".show", $data);
    }

    public function destroy($id)
    {
        notAjaxAbort();
        $id = decode($id);
        DB::beginTransaction();
        try {
            JalurMasukPPDB::findOrFail($id)->delete();
        } catch (\Exception $e) {
            DB::rollBack();
            return responseFail(GAGAL_HAPUS);
        }
        DB::commit();
        return responseSuccess(BERHASIL_HAPUS);
    }
}
