<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebSettingRequest;
use App\Models\WebSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebSettingController extends Controller
{
    protected $view = 'cms.web-setting';

    public function edit()
    {
        $data = [
            "title" => "Setting Website",
            "settings" => WebSetting::get()->keyBy('param')
        ];
        return view($this->view . ".edit", $data);
    }

    public function update(WebSettingRequest $request)
    {
        DB::beginTransaction();
        try {
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $upload_logo = uploadFile($file, 'web-setting');
                $logo = WebSetting::where('param', 'logo')->get()->first();
                if ($logo->value) {
                    deleteFile($logo->value);
                }
                DB::table('web_settings')->where('param', 'logo')->update(['value' => $upload_logo['file']]);
            }
            if ($request->hasFile('favicon')) {
                $file = $request->file('favicon');
                $upload_favicon = uploadFile($file, 'web-setting');
                $favicon = WebSetting::where('param', 'favicon')->get()->first();
                if ($favicon->value) {
                    deleteFile($favicon->value);
                }
                DB::table('web_settings')->where('param', 'favicon')->update(['value' => $upload_favicon['file']]);
            }
            foreach ($request->post("setting") as $key => $item) {
                DB::table('web_settings')->where('param', $key)->update(['value' => $item]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('sweet_error', GAGAL_SIMPAN);
        }
        DB::commit();
        return redirect()->back()->with('sweet_success', BERHASIL_SIMPAN);
    }
}
