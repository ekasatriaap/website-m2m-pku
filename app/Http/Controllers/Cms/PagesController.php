<?php

namespace App\Http\Controllers\Cms;

use App\DataTables\PagesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\PagesRequest;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    protected $view = 'cms.pages';

    public function index(PagesDataTable $dataTable)
    {
        $data = [
            "title" => "Halaman",
        ];

        return $dataTable->render("{$this->view}.index", $data);
    }

    public function create()
    {
        $data = [
            "title" => "Tambah Pages",
            "pages" => new Pages(),
        ];
        return view("{$this->view}.create", $data);
    }

    public function store(PagesRequest $request)
    {
        $attributes = $request->validated();
        DB::beginTransaction();
        try {
            if ($request->hasFile('image')) {
                $upload_file = uploadFile($request->file('image'), 'pages');
                $attributes['image'] = $upload_file['file'];
            }
            Pages::create($attributes);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('sweet_error', GAGAL_SIMPAN);
        }
        DB::commit();
        return redirect()->route("{$this->view}.index")->with('sweet_success', BERHASIL_SIMPAN);
    }

    public function edit($id)
    {
        $id = decode($id);
        $pages = Pages::findOrFail($id);
        $data = [
            "title" => "Edit Berita",
            "pages" => $pages,
        ];
        return view("{$this->view}.edit", $data);
    }

    public function update(Request $request, $id)
    {
        $id = decode($id);
        $requesRule = new PagesRequest();
        $validator = Validator::make($request->all(), $requesRule->rules($id), [], $requesRule->attributes());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $attributes = $validator->validated();
        DB::beginTransaction();
        try {
            $pages = Pages::findOrFail($id);
            if ($request->hasFile('image')) {
                $upload_file = uploadFile($request->file('image'), 'pages');
                $attributes['image'] = $upload_file['file'];
                // setelah berhasil upload, hapus gambar lama
                if ($pages->image)
                    deleteFile($pages->image);
            }
            $pages->update($attributes);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('sweet_error', GAGAL_SIMPAN);
        }
        DB::commit();
        return redirect()->route("{$this->view}.index")->with('sweet_success', BERHASIL_SIMPAN);
    }

    public function show($id)
    {
        notAjaxAbort();
        $id = decode($id);
        $pages = Pages::findOrFail($id);
        $data = [
            "pages" => $pages
        ];

        return view("{$this->view}.show", $data);
    }

    public function destroy($id)
    {
        notAjaxAbort();
        $id = decode($id);
        $pages = Pages::findOrFail($id);
        DB::beginTransaction();
        try {
            // hapus file image
            if ($pages->image)
                deleteFile($pages->image);
            $pages->delete();
        } catch (\Exception $e) {
            DB::rollBack();
            return responseFail(GAGAL_HAPUS);
        }
        DB::commit();
        return responseSuccess(BERHASIL_HAPUS);
    }
}
