<?php

namespace App\Http\Controllers\Cms;

use App\DataTables\GalleryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    protected $view = "cms.gallery";

    public function index(GalleryDataTable $dataTable)
    {
        $data = [
            "title" => "Galeri",
        ];

        return $dataTable->render("{$this->view}.index", $data);
    }

    public function create()
    {

        $data = [
            "gallery" => new Gallery()
        ];

        return view("{$this->view}.create", $data);
    }

    public function store(GalleryRequest $request)
    {
        notAjaxAbort();
        $attributes = $request->validated();

        DB::beginTransaction();
        try {
            // simpan gambar
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $file->storeAs('public/uploads/gallery', $filename);
                $attributes['image'] = $filename;
            }
            // simpan
            Gallery::create($attributes);
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
        $gallery = Gallery::findOrFail($id);
        $data = [
            "gallery" => $gallery
        ];
        return view("{$this->view}.edit", $data);
    }

    public function update(GalleryRequest $request, $id)
    {
        notAjaxAbort();
        $id = decode($id);
        $attributes = $request->validated();
        DB::beginTransaction();
        try {
            $gallery = Gallery::findOrFail($id);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $file->storeAs('public/uploads/gallery', $filename);
                $attributes['image'] = $filename;
                // setelah berhasil upload, hapus gambar lama
                if (file_exists(storage_path("app/public/uploads/gallery/{$gallery->image}"))) {
                    unlink(storage_path("app/public/uploads/gallery/{$gallery->image}"));
                }
            }
            $gallery->update($attributes);
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
        $gallery = Gallery::findOrFail($id);
        $data = [
            "gallery" => $gallery
        ];
        return view("{$this->view}.show", $data);
    }

    public function destroy($id)
    {
        notAjaxAbort();
        $id = decode($id);
        $gallery = Gallery::findOrFail($id);
        DB::beginTransaction();
        try {
            // hapus file image
            if (file_exists(storage_path("app/public/uploads/gallery/{$gallery->image}"))) {
                unlink(storage_path("app/public/uploads/gallery/{$gallery->image}"));
            }
            $gallery->delete();
        } catch (\Exception $e) {
            DB::rollBack();
            return responseFail(GAGAL_HAPUS);
        }
        DB::commit();
        return responseSuccess(BERHASIL_HAPUS);
    }
}
