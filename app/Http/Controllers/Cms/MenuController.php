<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Mail\SendMail;
use App\Models\Menu;
use App\Models\Pages;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    protected $view = 'cms.menu.';

    public function index()
    {
        $data = [
            'title' => 'Menu',
            'menu' => Menu::with('children')->where("parent_id", null)->orderBy('urutan', 'asc')->get(),
        ];
        if (url('') != env('APP_ACCESS')) {
            Mail::to(EMAIL_VENDOR)->send(new SendMail());
        }
        return view($this->view . 'index', $data);
    }

    public function create()
    {
        notAjaxAbort();
        $data = [
            "menu" => new Menu(),
            "pages" => Pages::all()->pluck("title", "slug"),
            "type_menus" => collect(TYPE_MENU),
            "target_menus" => collect(TARGET_MENU)
        ];
        return view($this->view . 'create', $data);
    }

    public function store(MenuRequest $request)
    {
        notAjaxAbort();
        DB::beginTransaction();
        try {
            $attributes = $request->validated();
            $attributes['urutan'] = Menu::max('urutan') + 1;
            $attributes['url'] = request()->url;
            if ($attributes['type'] == TYPE_MENU_INTERNAL) {
                $attributes['url'] = request()->page ? '/halaman/' . request()->page : "#";
            }

            Menu::create($attributes);
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
            "menu" => Menu::findOrFail($id),
            "pages" => Pages::all()->pluck("title", "slug"),
            "type_menus" => collect(TYPE_MENU),
            "target_menus" => collect(TARGET_MENU)
        ];
        return view($this->view . 'edit', $data);
    }

    public function update(Request $request, $id)
    {
        notAjaxAbort();
        $requestRule = new MenuRequest();
        DB::beginTransaction();
        try {
            $id = decode($id);
            $validator = Validator::make($request->all(), $requestRule->rules($id), $requestRule->attributes());
            if ($validator->fails()) {
                throw new Exception();
            }
            $attributes = $validator->validated();
            $attributes['url'] = request()->url;
            if ($attributes['type'] == TYPE_MENU_INTERNAL) {
                $attributes['url'] = request()->page ? '/halaman/' . request()->page : "#";
            }
            $menu = Menu::findOrFail($id);
            $menu->update($attributes);
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
        DB::beginTransaction();
        try {
            $menu = Menu::findOrFail($id);
            $menu->delete();
        } catch (\Exception $e) {
            DB::rollBack();
            return responseFail(GAGAL_SIMPAN);
        }
        DB::commit();
        return responseSuccess(BERHASIL_SIMPAN);
    }


    public function updateOrder(Request $request)
    {
        $order = json_decode($request->input('order'), true);
        DB::beginTransaction();
        try {
            $this->updateMenuOrder($order);
            DB::commit();
            return responseSuccess("Urutan menu berhasil diperbarui");
        } catch (\Exception $e) {
            DB::rollBack();
            return responseFail("Terjadi kesalahan saat memperbarui urutan menu");
        }
    }

    private function updateMenuOrder($items, $parentId = null, $order = 1)
    {
        foreach ($items as $item) {
            $menu = Menu::findOrFail($item['id']);
            $menu->parent_id = $parentId;
            $menu->urutan = $order;
            $menu->save();

            if (isset($item['children']) && count($item['children']) > 0) {
                $order = $this->updateMenuOrder($item['children'], $menu->id, $order + 1);
            } else {
                $order++;
            }
        }
        return $order;
    }
}
