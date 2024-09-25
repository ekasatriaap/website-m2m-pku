<?php

namespace App\Http\Controllers\Cms;

use App\DataTables\NewsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\Bidang;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class NewsController extends Controller
{
    protected $view = 'cms.news';

    public function index(NewsDataTable $dataTable)
    {
        $data = [
            "title" => "Berita",
        ];

        return $dataTable->render("{$this->view}.index", $data);
    }

    public function create()
    {

        $status = array_combine(News::STATUS, array_map('ucfirst', News::STATUS));
        $data = [
            "title" => "Tambah Berita",
            "news" => new News(),
            "bidangs" => Bidang::all()->pluck("nama_bidang", "id"),
            "status" => collect($status)
        ];
        return view("{$this->view}.create", $data);
    }

    public function store(NewsRequest $request)
    {
        $attributes = $request->validated();
        DB::beginTransaction();
        try {
            $attributes['created_by'] = accountLogin()->id;
            if (accountIsAdmin()) {
                $attributes['id_bidang'] = accountLogin()->id_bidang;
                $attributes['status'] = News::STATUS_SUBMISSION;
            }
            if ($request->hasFile('image')) {
                $upload_file = uploadFile($request->file('image'), 'news', true);
                $attributes['image'] = $upload_file['image'];
                $attributes['thumbnail'] = $upload_file['thumbnail'];
            }
            News::create($attributes);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('sweet_error', GAGAL_SIMPAN);
        }
        DB::commit();
        return redirect()->route('cms.news.index')->with('sweet_success', BERHASIL_SIMPAN);
    }

    public function edit($id)
    {
        $id = decode($id);
        $news = News::findOrFail($id);
        $status = array_combine(News::STATUS, array_map('ucfirst', News::STATUS));
        $data = [
            "title" => "Edit Berita",
            "news" => $news,
            "bidangs" => Bidang::all()->pluck("nama_bidang", "id"),
            "status" => collect($status)
        ];
        return view("{$this->view}.edit", $data);
    }

    public function update(Request $request, $id)
    {
        $id = decode($id);
        $requesRule = new NewsRequest();
        $validator = Validator::make($request->all(), $requesRule->rules($id), [], $requesRule->attributes());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $attributes = $validator->validated();
        DB::beginTransaction();
        try {
            $news = News::findOrFail($id);
            if ($request->hasFile('image')) {
                $upload_file = uploadFile($request->file('image'), 'news', true);
                $attributes['image'] = $upload_file['image'];
                $attributes['thumbnail'] = $upload_file['thumbnail'];
                // setelah berhasil upload, hapus gambar lama
                if ($news->image)
                    deleteFile($news->image);
                if ($news->thumbnail)
                    deleteFile($news->thumbnail);
            }
            $news->update($attributes);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('sweet_error', GAGAL_SIMPAN);
        }
        DB::commit();
        return redirect()->route('cms.news.index')->with('sweet_success', BERHASIL_SIMPAN);
    }

    public function show($id)
    {
        notAjaxAbort();
        $id = decode($id);
        $news = News::with(['user', 'bidang'])->findOrFail($id);
        $data = [
            "news" => $news
        ];

        return view("{$this->view}.show", $data);
    }

    public function destroy($id)
    {
        notAjaxAbort();
        $id = decode($id);
        $news = News::findOrFail($id);
        DB::beginTransaction();
        try {
            // hapus file image
            if ($news->image)
                deleteFile($news->image);
            if ($news->thumbnail)
                deleteFile($news->thumbnail);
            $news->delete();
        } catch (\Exception $e) {
            DB::rollBack();
            return responseFail(GAGAL_HAPUS);
        }
        DB::commit();
        return responseSuccess(BERHASIL_HAPUS);
    }
}
