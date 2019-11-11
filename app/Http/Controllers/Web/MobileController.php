<?php

namespace App\Http\Controllers\Web;

use App\Models\Apps;
use App\Models\Banner;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MobileController extends Controller
{

    public function index(Request $request)
    {

        $banners = Banner::where(['status'=>1])->remember(100800)->get()->toArray();

        $category = Category::where(['status'=>1,'level'=>1])->remember(100800)->orderBy('id','asc')->get()->toArray();

        foreach ($category as $k => &$v){

            $apps = Apps::where(['category_1'=>$v['id'],'status'=>1])->remember(100800)->limit(8)->get()->toArray();

            $v['apps'] = $apps;

        }

        $rank = Apps::where(['status'=>1])->orderBy('id','desc')->remember(100800)->limit(8)->get()->toArray();

        array_unshift($category,['name'=>'平台精品推荐','apps'=>$rank,'id'=>0,'slug'=>'']);

        return view('mobile/home',[
            'banners'=>$banners,
            'category' => $category
        ]);

    }

    public function news(Request $request)
    {

        $news = News::where(['status'=>1]);

        if($request->slug){

            $category_info = NewsCategory::where(['slug'=>$request->slug])->remember(100800)->first()->toArray();

            $news = $news->where(['category_1'=>$category_info['id']])->remember(100800)->orderBy('id','desc')->paginate(10);

        }else{

            $news = $news->remember(100800)->orderBy('id','desc')->paginate(10);

        }

        $links = $news->links();

        $news_category = NewsCategory::where(['status'=>1,'level'=>1])->remember(100800)->get()->toArray();

        return view('mobile/news',[
            'news' => $news,
            'news_category' => $news_category,
            'current_category' => $request->slug,
            'links' => $links
        ]);

    }

    public function newsInfo(Request $request)
    {

        $info = News::where(['slug'=>$request->slug])->remember(100800)->first()->toArray();

        return view('mobile/news_info',[
            'info' => $info,
            'title' => $info['seo_title'],
            'keywords' => $info['seo_keywords'],
            'desc' => $info['seo_describe']
        ]);

    }

    public function appInfo(Request $request)
    {

        $info = Apps::where(['slug'=>$request->slug])->remember(100800)->first()->toArray();

        $category_info = Category::where(['id'=>$info['category_1']])->first()->toArray();

        return view('mobile/app_info',[
            'info' => $info,
            'title' => $info['seo_title'],
            'keywords' => $info['seo_keywords'],
            'desc' => $info['seo_describe'],
            'category_info' => $category_info
        ]);

    }

    public function app(Request $request)
    {

        $category = Category::where(['status'=>1,'level'=>1])->remember(100800)->get()->toArray();

        foreach ($category as $k => &$v){

            $apps = Apps::where(['category_1'=>$v['id'],'status'=>1])->remember(100800)->limit(5)->get()->toArray();

            $v['apps'] = $apps;

        }

        return view('mobile/app',[
            'category' => $category
        ]);

    }

    public function appList(Request $request)
    {

        $category_info = [
            'name' => '平台精品推荐',
            'id' => 0,
            'slug' => ''
        ];

        if($request->slug){

            $category_info = Category::where(['slug'=>$request->slug])->remember(100800)->first()->toArray();

        }

        $condition = $request->slug ? ['status'=>1,'category_1'=>$category_info['id']] : ['status'=>1];

        $apps = Apps::where($condition)->remember(100800)->get()->toArray();

        return view('mobile/app_list',[
            'apps' => $apps,
            'category_info' => $category_info,
            'title' => $request->category > 0 ? $category_info['seo_title'] : '',
            'keywords' => $request->category > 0 ? $category_info['seo_keywords'] : '',
            'desc' => $request->category > 0 ? $category_info['seo_describe'] : ''
        ]);

    }

}
