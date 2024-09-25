<?php

namespace App\Http\Controllers\Cms;

use App\DataTables\VideoDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    protected $view = 'cms.video';

    public function index(VideoDataTable $dataTable)
    {
        $data = [
            "title" => "Video",
        ];

        return $dataTable->render("{$this->view}.index", $data);
    }

    public function create()
    {
        notAjaxAbort();
        $data = [
            "video" => new Video()
        ];
        return view("{$this->view}.create", $data);
    }

    public function store(VideoRequest $request)
    {
        notAjaxAbort();
        $attributes = $request->validated();
        DB::beginTransaction();
        try {
            Video::create($attributes);
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
            "video" => Video::findOrFail($id)
        ];
        return view("{$this->view}.edit", $data);
    }

    public function update(VideoRequest $request, $id)
    {
        notAjaxAbort();
        $id = decode($id);
        $attributes = $request->validated();
        DB::beginTransaction();
        try {
            $video = Video::findOrFail($id);
            $video->update($attributes);
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
            $video = Video::findOrFail($id);
            $video->delete();
        } catch (\Exception $e) {
            DB::rollBack();
            return responseFail(GAGAL_HAPUS);
        }
        DB::commit();
        return responseSuccess(BERHASIL_HAPUS);
    }
}
