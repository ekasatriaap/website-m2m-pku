<?php

namespace App\Http\Controllers\Cms;

use App\DataTables\TestimoniDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\TestimoniRequest;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimoniController extends Controller
{
    protected $view = "cms.testimoni";

    public function index(TestimoniDataTable $dataTable)
    {
        $data = [
            "title" => "Testimoni"
        ];
        return $dataTable->render($this->view . ".index", $data);
    }

    public function create()
    {
        notAjaxAbort();
        $data = [
            "testimoni" => new Testimoni()
        ];
        return view($this->view . ".create", $data);
    }

    public function store(TestimoniRequest $request)
    {
        notAjaxAbort();
        DB::beginTransaction();
        try {
            $attributes = $request->validated();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $upload = uploadFile($file, 'testimoni');
                $attributes['image'] = $upload['file'];
            }
            Testimoni::create($attributes);
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
            "testimoni" => Testimoni::findOrFail($id)
        ];
        return view($this->view . ".edit", $data);
    }

    public function update(TestimoniRequest $request, $id)
    {
        notAjaxAbort();
        DB::beginTransaction();
        $id = decode($id);
        try {
            $attributes = $request->validated();
            $testimoni = Testimoni::findOrFail($id);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $upload = uploadFile($file, 'testimoni');
                $attributes['image'] = $upload['file'];
                // setelah berhasil upload, hapus gambar lama
                if ($testimoni->image)
                    deleteFile($testimoni->image);
            }
            $testimoni->update($attributes);
        } catch (\Exception $e) {
            DB::rollBack();
            return responseFail(GAGAL_UBAH);
        }
        DB::commit();
        return responseSuccess(BERHASIL_UBAH);
    }

    public function show($id)
    {
        notAjaxAbort();
        $id = decode($id);
        $data = [
            "testimoni" => Testimoni::findOrFail($id)
        ];
        return view($this->view . ".show", $data);
    }

    public function destroy($id)
    {
        notAjaxAbort();
        $id = decode($id);
        DB::beginTransaction();
        try {
            $testimoni = Testimoni::findOrFail($id);
            if ($testimoni->image)
                deleteFile($testimoni->image);
            $testimoni->delete();
        } catch (\Exception $e) {
            DB::rollBack();
            return responseFail(GAGAL_HAPUS);
        }
        DB::commit();
        return responseSuccess(BERHASIL_HAPUS);
    }
}
