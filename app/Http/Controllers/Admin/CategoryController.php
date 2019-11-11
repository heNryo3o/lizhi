<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ChangeStatusRequest;
use App\Http\Requests\Admin\DestroyRequest;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Resources\Admin\CategoryResource;
use App\Models\Category;
use App\Models\NewsCategory;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class CategoryController extends Controller
{

    public function index(Request $request)
    {

        $order_column = $request->input('order_column', 'id');

        $order_type = $request->input('order_type', 'desc');

        $list = Category::remember(10080)->orderBy($order_column, $order_type)->paginate($request->limit);

        return $this->success(CategoryResource::collection($list));

    }

    public function create(CategoryRequest $request)
    {

        $data = $request->all();

        if($request->parent_id){

            $data['parent_id'] = is_array($data['parent_id']) ? Arr::last($request->parent_id) : $data['parent_id'];

            $parent = Category::where('id',$data['parent_id'])->get('level')->first();

            $data['level'] = $parent['level'] + 1;

        }else{

            $data['level'] = 1;

        }

        $data['slug'] = implode('-',pinyin($data['name']));

        $count = Category::where(['slug'=>$data['slug']])->count();

        if($count > 0){
            return $this->failed('slug重复,请修改名称后重新提交');
        }

        Category::create($data);

        return $this->success();

    }

    public function edit(CategoryRequest $request)
    {

        $data = $request->all();

        if($request->parent_id){

            $data['parent_id'] = is_array($data['parent_id']) ? Arr::last($request->parent_id) : $data['parent_id'];

            $parent = Category::where('id',$data['parent_id'])->get('level')->first();

            $data['level'] = $parent['level'] + 1;

        }else{

            $data['level'] = 1;

        }

        $data['slug'] = implode('-',pinyin($data['name']));

        $count = Category::where(['slug'=>$data['slug']])->where('id','!=',$request->id)->count();

        if($count > 0){
            return $this->failed('slug重复,请修改名称后重新提交');
        }

        Category::find($request->id)->update($data);

        return $this->success();

    }

    public function changeStatus(ChangeStatusRequest $request)
    {

        Category::find($request->id)->update(['status'=>$request->status]);

        return $this->success();

    }

    public function destroy(DestroyRequest $request)
    {

        Category::destroy($request->id);

        return $this->success();

    }


    public function options()
    {

        $data = [];

        $parent = Category::where(['level' => 1])->remember(10080)->get(['id', 'name'])->toArray();

        foreach ($parent as $k => $v) {

            $data[$k] = $v;

            $child = Category::where(['parent_id' => $v['id']])->remember(10080)->get(['id', 'name']);

            if ($child) {

                foreach ($child->toArray() as $vk => $vv) {

                    $data[$k]['children'][$vk] = $vv;

                }

            } else {

                $data[$k]['children'] = [];

            }

        }

        $options = $this->dealOptions($data, 'id', 'name');

        return $this->success($options);

    }

    public function newsOptions()
    {

        $data = [];

        $parent = NewsCategory::where(['level' => 1])->remember(10080)->get(['id', 'name'])->toArray();

        foreach ($parent as $k => $v) {

            $data[$k] = $v;

            $child = NewsCategory::where(['parent_id' => $v['id']])->remember(10080)->get(['id', 'name']);

            if ($child) {

                foreach ($child->toArray() as $vk => $vv) {

                    $data[$k]['children'][$vk] = $vv;

                }

            } else {

                $data[$k]['children'] = [];

            }

        }

        $options = $this->dealOptions($data, 'id', 'name');

        return $this->success($options);

    }

}
