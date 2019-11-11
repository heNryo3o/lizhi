<?php

namespace App\Http\Controllers\Web;

use App\Models\Apps;
use App\Models\Banner;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Seo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use QL\QueryList;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ViewController extends Controller
{

    public function test(Request $request)
    {

        return view('fake');

    }

    public function fake(Request $request)
    {

        $content = $this->fakeContent($request->info);

        echo $content;
        die;

    }

    public function test2()
    {

        (new Seo())->getNews();

        return;

    }

    public function query(Request $request)
    {

        set_time_limit(0);
        ini_set('memory_limit', '1024M');

        if (empty($request->page)) {
            return $this->failed('缺少参数');
        }

        $i = $request->page;

        $end = $i + 1;

        for ($i = $request->page; $i <= $end; $i++) {

            $page = QueryList::get('https://a.jiemian.com/index.php?m=search&a=index&msg=%E6%8C%A3%E9%92%B1&type=news&page=' . $i)->rules(
                [
                    'link' => array('h3>a', 'href'),
                    'title' => array('h3>a', 'text')
                ]
            )->queryData();

            foreach ($page as $k => $v) {

                $count = News::where(['url' => $v['link']])->count();

                if ($count == 0 && $v['title'] && $v['link']) {

                    $data = [
                        'name' => '',
                        'status' => 2,
                        'content' => '',
                        'thumb' => 'http://bian-cheng-me.oss-cn-hongkong.aliyuncs.com/public/2019/11/09/jwnmtwADAU5WZeE5AgaGnciRAGr8G6qkpTkh52tc.png',
                        'category_1' => 4,
                        'url' => $v['link'],
                        'slug' => ''
                    ];

                    News::create($data);

                }

            }

        }

        return $this->success();

    }

    public function index(Request $request)
    {

        $banners = Banner::where(['status' => 1])->remember(100800)->get()->toArray();

        $category = Category::where(['status' => 1, 'level' => 1])->remember(100800)->get()->toArray();

        foreach ($category as $k => &$v) {

            $apps = Apps::where(['category_1' => $v['id'], 'status' => 1])->remember(100800)->limit(6)->get()->toArray();

            $v['apps'] = $apps;

        }

        $rank = Apps::where(['status' => 1])->orderBy('id', 'desc')->remember(100800)->limit(10)->get()->toArray();

        return view('home', [
            'banners' => $banners,
            'category' => $category,
            'rank' => $rank
        ]);

    }

    public function news(Request $request)
    {

        $news = News::where(['status' => 1]);

        if ($request->slug) {

            $category_info = NewsCategory::where(['slug' => $request->slug])->remember(100800)->first()->toArray();

            $news = $news->where(['category_1' => $category_info['id']])->remember(100800)->orderBy('id', 'desc')->paginate(10);

        } else {

            $news = $news->remember(100800)->orderBy('id', 'desc')->paginate(10);

        }

        $links = $news->links();

        $category = Category::where(['status' => 1, 'level' => 1])->remember(100800)->get()->toArray();

        $rank = Apps::where(['status' => 1])->orderBy('id', 'desc')->remember(100800)->limit(10)->get()->toArray();

        $news_category = NewsCategory::where(['status' => 1, 'level' => 1])->remember(100800)->get()->toArray();

        return view('news', [
            'category' => $category,
            'rank' => $rank,
            'news' => $news,
            'news_category' => $news_category,
            'current_category' => $request->slug,
            'links' => $links
        ]);

    }

    public function newsInfo(Request $request)
    {

        $category = Category::where(['status' => 1, 'level' => 1])->remember(100800)->get()->toArray();

        $rank = Apps::where(['status' => 1])->orderBy('id', 'desc')->remember(100800)->limit(10)->get()->toArray();

        $info = News::where(['slug' => $request->slug])->remember(100800)->first()->toArray();

        $id = $info['id'] > 10 ? $info['id'] : 10;

        $recommen = News::where(['status'=>1])->where('id','<',$id)->remember(100800)->orderBy('id','desc')->limit(10)->get()->toArray();

        return view('news_info', [
            'info' => $info,
            'category' => $category,
            'rank' => $rank,
            'title' => $info['seo_title'],
            'keywords' => $info['seo_keywords'],
            'desc' => $info['seo_describe'],
            'recommen' => $recommen
        ]);

    }

    public function appInfo(Request $request)
    {

        $category = Category::where(['status' => 1, 'level' => 1])->remember(100800)->get()->toArray();

        $rank = Apps::where(['status' => 1])->orderBy('id', 'desc')->remember(100800)->limit(10)->get()->toArray();

        $info = Apps::where(['slug' => $request->slug])->remember(100800)->first()->toArray();

        $category_info = Category::where(['id' => $info['category_1']])->first()->toArray();

        return view('app_info', [
            'category' => $category,
            'rank' => $rank,
            'info' => $info,
            'title' => $info['seo_title'],
            'keywords' => $info['seo_keywords'],
            'desc' => $info['seo_describe'],
            'category_info' => $category_info
        ]);

    }

    public function app(Request $request)
    {

        $category = Category::where(['status' => 1, 'level' => 1])->remember(100800)->get()->toArray();

        foreach ($category as $k => &$v) {

            $apps = Apps::where(['category_1' => $v['id'], 'status' => 1])->remember(100800)->limit(6)->get()->toArray();

            $v['apps'] = $apps;

        }

        $rank = Apps::where(['status' => 1])->orderBy('id', 'desc')->remember(100800)->limit(10)->get()->toArray();

        return view('app', [
            'category' => $category,
            'rank' => $rank
        ]);

    }

    public function appList(Request $request)
    {

        $category_info = [];

        if ($request->slug) {

            $category_info = Category::where(['slug' => $request->slug])->remember(100800)->first()->toArray();

        }

        $category = Category::where(['status' => 1, 'level' => 1])->remember(100800)->get()->toArray();

        $rank = Apps::where(['status' => 1])->orderBy('id', 'desc')->remember(100800)->limit(10)->get()->toArray();

        $condition = $request->slug ? ['status' => 1, 'category_1' => $category_info['id']] : ['status' => 1];

        $apps = Apps::where($condition)->remember(100800)->get()->toArray();

        return view('app_list', [
            'category' => $category,
            'rank' => $rank,
            'apps' => $apps,
            'category_info' => $category_info,
            'title' => $category_info ? $category_info['seo_title'] : '',
            'keywords' => $category_info ? $category_info['seo_keywords'] : '',
            'desc' => $category_info ? $category_info['seo_describe'] : ''
        ]);

    }

    public function seo()
    {

        $seo = new Seo();

        $seo->sitemap();

        $seo->pushUrl();

        return;

    }

}
