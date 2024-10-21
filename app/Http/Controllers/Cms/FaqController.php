<?php

namespace App\Http\Controllers\Cms;

use App\DataTables\FaqDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    protected $view = "cms.faq";

    public function index(FaqDataTable $dataTable)
    {
        $data = [
            "title" => "FAQ",
        ];

        return $dataTable->render("{$this->view}.index", $data);
    }

    public function create()
    {
        notAjaxAbort();
        $data = [
            "title" => "Tambah FAQ",
            "faq" => new Faq(),
        ];

        return view("{$this->view}.create", $data);
    }

    public function store(FaqRequest $request)
    {
        notAjaxAbort();
        $attributes = $request->validated();

        DB::beginTransaction();
        try {
            Faq::create($attributes);
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
        $faq = Faq::findOrFail($id);
        $data = [
            "title" => "Edit FAQ",
            "faq" => $faq,
        ];
        return view("{$this->view}.edit", $data);
    }

    public function update(FaqRequest $request, $id)
    {
        notAjaxAbort();
        $id = decode($id);
        $faq = Faq::findOrFail($id);
        $attributes = $request->validated();

        DB::beginTransaction();
        try {
            $faq->update($attributes);
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
            Faq::findOrFail($id)->delete();
        } catch (\Exception $e) {
            DB::rollBack();
            return responseFail(GAGAL_HAPUS);
        }
        DB::commit();
        return responseSuccess(BERHASIL_HAPUS);
    }
}
