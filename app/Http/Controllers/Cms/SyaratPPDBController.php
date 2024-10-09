<?php

namespace App\Http\Controllers\Cms;

use App\DataTables\SyaratPPDBDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\SyaratPPDBRequest;
use App\Models\SyaratPPDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SyaratPPDBController extends Controller
{
    protected $view = 'cms.syarat-ppdb';

    public function index(SyaratPPDBDataTable $dataTable)
    {
        $data = [
            "title" => "Syarat PPDB",
        ];
        return $dataTable->render($this->view . '.index', $data);
    }

    public function create()
    {
        notAjaxAbort();
        $data = [
            "title" => "Tambah Syarat PPDB",
            "syarat_ppdb" => new SyaratPPDB(),
        ];
        return view($this->view . '.create', $data);
    }

    public function store(SyaratPPDBRequest $request)
    {
        notAjaxAbort();
        DB::beginTransaction();
        try {
            $data = $request->validated();
            SyaratPPDB::create($data);
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
            "title" => "Edit Syarat PPDB",
            "syarat_ppdb" => SyaratPPDB::find($id),
        ];
        return view($this->view . '.edit', $data);
    }

    public function update(SyaratPPDBRequest $request, $id)
    {
        notAjaxAbort();
        $id = decode($id);
        DB::beginTransaction();
        try {
            $data = $request->validated();
            SyaratPPDB::find($id)->update($data);
        } catch (\Exception $e) {
            DB::rollBack();
            return responseFail(GAGAL_SIMPAN);
        }
        DB::commit();
        return responseSuccess(BERHASIL_SIMPAN);
    }

    public function destroy($id)
    {
        notAjaxAbort();
        $id = decode($id);
        DB::beginTransaction();
        try {
            SyaratPPDB::find($id)->delete();
        } catch (\Exception $e) {
            DB::rollBack();
            return responseFail(GAGAL_HAPUS);
        }
        DB::commit();
        return responseSuccess(BERHASIL_HAPUS);
    }
}
