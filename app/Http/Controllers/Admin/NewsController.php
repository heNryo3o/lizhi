<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AppsResource;
use App\Http\Resources\Admin\NewsResource;
use App\Models\Apps;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index(Request $request)
    {

        $list = News::filter($request->all())->orderBy('id','desc')->paginate($request->limit);

        return $this->success(NewsResource::collection($list));

    }

    public function edit(Request $request)
    {

        $data = $request->all();

        $data['category_1'] = $data['category'][0] ? $data['category'][0] : 0;

        $data['slug'] = implode('-',pinyin($data['name']));

        $count = News::where(['slug'=>$data['slug']])->where('id','!=',$request->id)->count();

        if($count > 0){
            return $this->failed('slug重复,请修改名称后重新提交');
        }

        News::find($request->id)->update($data);

        return $this->success();

    }

    public function create(Request $request)
    {

        $data = $request->all();

        $data['category_1'] = $data['category'][0] ? $data['category'][0] : 0;

        $data['slug'] = implode('-',pinyin($data['name']));

        $count = News::where(['slug'=>$data['slug']])->count();

        if($count > 0){
            return $this->failed('slug重复,请修改名称后重新提交');
        }

        News::create($data);

        return $this->success();

    }

    public function changeStatus(Request $request)
    {

        News::find($request->id)->update(['status'=>$request->status]);

        return $this->success();

    }

    public function setRecommen(Request $request)
    {

        News::find($request->id)->update(['is_recommen'=>$request->status]);

        return $this->success();

    }

}
