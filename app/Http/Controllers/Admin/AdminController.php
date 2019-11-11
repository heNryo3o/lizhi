<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AdminRequest;
use App\Http\Requests\Admin\ChangeStatusRequest;
use App\Http\Resources\Admin\AdminResource;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    public function index(Request $request, Admin $admin)
    {

        $order_column = $request->input('order_column', 'id');

        $order_type = $request->input('order_type', 'desc');

        $list = $admin->filter($request->all())->orderBy($order_column, $order_type)->paginate($request->limit);

        return $this->success(AdminResource::collection($list));

    }

    public function edit(AdminRequest $request)
    {

        $admin = Admin::find($request->id);

        $admin->roles()->sync($request->roles_id);

        $admin->permissions()->sync($request->permissions);

        $admin->update($request->all());

        return $this->success();

    }

}
