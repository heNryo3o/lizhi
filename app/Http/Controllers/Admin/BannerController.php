<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AppsResource;
use App\Models\Apps;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function index(Request $request)
    {

        $list = Banner::orderBy('id','desc')->paginate($request->limit);

        return $this->success(AppsResource::collection($list));

    }

    public function edit(Request $request)
    {

        Banner::find($request->id)->update($request->all());

        return $this->success();

    }

    public function create(Request $request)
    {

        Banner::create($request->all());

        return $this->success();

    }

    public function changeStatus(Request $request)
    {

        Banner::find($request->id)->update(['status'=>$request->status]);

        return $this->success();

    }

}
