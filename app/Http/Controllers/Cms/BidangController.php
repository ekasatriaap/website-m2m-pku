<?php

namespace App\Http\Controllers\Cms;

use App\DataTables\BidangDataTable;
use App\Http\Controllers\Controller;
use App\Models\Bidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BidangController extends Controller
{
    protected $view = "cms.bidang";

    public function index(BidangDataTable $dataTable)
    {
        $data = [
            "title" => "Master Bidang",
        ];

        return $dataTable->render($this->view . ".index", $data);
    }

    public function create()
    {
        notAjaxAbort();

        $data = [
            "bidang" => new Bidang()
        ];

        return view("{$this->view}.create", $data);
    }

    public function store(Request $request)
    {
        notAjaxAbort();
        $request->validate([
            'nama_bidang' => 'required|string|max:255',
        ]);
        DB::beginTransaction();
        try {
            Bidang::create($request->all());
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
        $bidang = Bidang::findOrFail($id);
        $data = [
            "bidang" => $bidang
        ];
        return view("{$this->view}.edit", $data);
    }

    public function update(Request $request, $id)
    {
        notAjaxAbort();
        $request->validate([
            'nama_bidang' => 'required|string|max:255',
        ]);
        $id = decode($id);
        $bidang = Bidang::findOrFail($id);
        DB::beginTransaction();
        try {
            $bidang->update($request->all());
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
        $bidang = Bidang::findOrFail($id);
        DB::beginTransaction();
        try {
            $bidang->delete();
        } catch (\Exception $e) {
            DB::rollBack();
            return responseFail(GAGAL_HAPUS);
        }
        DB::commit();
        return responseSuccess(BERHASIL_HAPUS);
    }
}
