<?php

namespace App\Http\Controllers\Cms;

use App\DataTables\TabloidDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\TabloidRequest;
use App\Models\Tabloid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TabloidController extends Controller
{
    protected $view = "cms.tabloid";

    public function index(TabloidDataTable $dataTable)
    {
        $data = [
            'title' => "Tabloid",
        ];

        return $dataTable->render("{$this->view}.index", $data);
    }

    public function create()
    {
        notAjaxAbort();
        $data = [
            'title' => "Tabloid",
            "tabloid" => new Tabloid(),
        ];

        return view("{$this->view}.create", $data);
    }

    public function store(TabloidRequest $request)
    {
        notAjaxAbort();
        $attributes = $request->validated();
        DB::beginTransaction();
        try {
            if ($request->has("file")) {
                $file = $request->file("file");
                $upload = uploadFile($file, "tabloid");
                $attributes["file"] = $upload["file"];
            }
            Tabloid::create($attributes);
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
        $data = [
            'title' => "Tabloid",
            "tabloid" => Tabloid::findOrFail(decode($id)),
        ];
        return view("{$this->view}.edit", $data);
    }

    public function update(TabloidRequest $request, $id)
    {
        notAjaxAbort();
        $id = decode($id);
        $attributes = $request->validated();
        DB::beginTransaction();
        try {
            $tabloid = Tabloid::findOrFail($id);
            if ($request->has("file")) {
                $file = $request->file("file");
                $upload = uploadFile($file, "tabloid");
                $attributes["file"] = $upload["file"];

                if ($tabloid->file) {
                    deleteFile($tabloid->file);
                }
            }
            $tabloid->update($attributes);
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
        $data = [
            'title' => "Tabloid",
            "tabloid" => Tabloid::findOrFail(decode($id)),
        ];
        return view("{$this->view}.show", $data);
    }

    public function destroy($id)
    {
        notAjaxAbort();
        $id = decode($id);
        $tabloid = Tabloid::findOrFail($id);
        DB::beginTransaction();
        try {
            // hapus file
            if ($tabloid->file)
                deleteFile($tabloid->file);
            $tabloid->delete();
        } catch (\Exception $e) {
            DB::rollBack();
            return responseFail(GAGAL_HAPUS);
        }
        DB::commit();
        return responseSuccess(BERHASIL_HAPUS);
    }
}
