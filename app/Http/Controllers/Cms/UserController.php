<?php

namespace App\Http\Controllers\Cms;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Bidang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $view = "cms.users";

    public function index(UserDataTable $dataTable)
    {
        $data = [
            "title" => "Master Users",
        ];

        return $dataTable->render($this->view . ".index", $data);
    }

    public function create()
    {
        notAjaxAbort();
        $data = [
            "user" => new User(),
            'bidangs' => Bidang::all()->pluck("nama_bidang", "id"),
            "levels" => collect(LEVEL_USER)
        ];
        return view("{$this->view}.create", $data);
    }

    public function store(UserRequest $request)
    {
        notAjaxAbort();
        $attributes = $request->validated();
        DB::beginTransaction();
        try {
            if (accountIsOperator()) $attributes['level'] = ADMIN;
            $attributes['password'] = bcrypt($attributes['username']);
            User::create($attributes);
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
            "user" => User::findOrFail(decode($id)),
            'bidangs' => Bidang::all()->pluck("nama_bidang", "id"),
            "levels" => collect(LEVEL_USER)
        ];
        return view("{$this->view}.edit", $data);
    }

    public function update(Request $request, $id)
    {
        notAjaxAbort();
        $userRule = new UserRequest();
        $id = decode($id);
        $validator = Validator::make($request->all(), $userRule->rules($id), [], $userRule->attributes());
        if ($validator->fails()) {
            return responseFail($validator->errors()->first());
        }
        $attributes = $validator->validated();
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);
            if (accountIsOperator()) $attributes['level'] = ADMIN;
            $user->update($attributes);
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
        $user = User::findOrFail($id);
        DB::beginTransaction();
        try {
            $user->delete();
        } catch (\Exception $e) {
            DB::rollBack();
            return responseFail(GAGAL_HAPUS);
        }
        DB::commit();
        return responseSuccess(BERHASIL_HAPUS);
    }
}
