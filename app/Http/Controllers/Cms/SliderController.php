<?php

namespace App\Http\Controllers\Cms;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    protected $view = "cms.slider";

    public function index(SliderDataTable $dataTable)
    {
        $data = [
            "title" => "Sliders",
        ];

        return $dataTable->render("{$this->view}.index", $data);
    }

    public function create()
    {

        $data = [
            "slider" => new Slider()
        ];

        return view("{$this->view}.create", $data);
    }

    public function store(SliderRequest $request)
    {
        notAjaxAbort();
        $attributes = $request->validated();

        DB::beginTransaction();
        try {
            // simpan gambar
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $upload_file = uploadFile($file, 'slider');
                $attributes['image'] = $upload_file['file'];
            }
            // simpan
            slider::create($attributes);
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
        $slider = slider::findOrFail($id);
        $data = [
            "slider" => $slider
        ];
        return view("{$this->view}.edit", $data);
    }

    public function update(SliderRequest $request, $id)
    {
        notAjaxAbort();
        $id = decode($id);
        $attributes = $request->validated();
        DB::beginTransaction();
        try {
            $slider = slider::findOrFail($id);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $upload = uploadFile($file, 'slider');
                $attributes['image'] = $upload['file'];
                // setelah berhasil upload, hapus gambar lama
                if ($slider->image)
                    deleteFile($slider->image);
            }
            $slider->update($attributes);
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
        $slider = slider::findOrFail($id);
        $data = [
            "slider" => $slider
        ];
        return view("{$this->view}.show", $data);
    }

    public function destroy($id)
    {
        notAjaxAbort();
        $id = decode($id);
        $slider = slider::findOrFail($id);
        DB::beginTransaction();
        try {
            // hapus file image
            if ($slider->image)
                deleteFile($slider->image);
            $slider->delete();
        } catch (\Exception $e) {
            DB::rollBack();
            return responseFail(GAGAL_HAPUS);
        }
        DB::commit();
        return responseSuccess(BERHASIL_HAPUS);
    }
}
