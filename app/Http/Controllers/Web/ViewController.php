<?php

namespace App\Http\Controllers\Web;

use App\Models\Apps;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Seo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use QL\QueryList;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ViewController extends Controller
{

    public function test2()
    {

        $seo = new Seo();

        for($i=0;$i<1000;$i++){

            $seo->getNews();

        }

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

        $end = $i + 100;

        for ($i = $request->page; $i <= $end; $i++) {

            $page = QueryList::get('https://www.lz13.cn/lizhi/lizhigequ-'.$i.'.html')->rules(
                [
                    'link' => array('h3>a', 'href'),
                    'title' => array('h3>a', 'text')
                ]
            )->queryData();

            foreach ($page as $k => $v) {

                Article::where(['url'=>$v['link']])->delete();

                $count = Article::where(['url' => $v['link']])->count();

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

                    Article::create($data);

                }

            }

        }

        return $this->success();

    }

    public function index(Request $request)
    {

        $category = ArticleCategory::where(['status' => 1, 'level' => 1])->remember(100800)->get()->toArray();

        foreach ($category as $k => &$v) {

            $articles = Article::where(['category_1' => $v['id'], 'status' => 1])->remember(100800)->orderBy('id','desc')->limit(8)->get()->toArray();

            $v['articles'] = $articles;

        }

        return view('home',[
            'category' => $category,
            'current_category' => ''
        ]);

    }

    public function article(Request $request)
    {

        $articles = Article::where(['status' => 1]);

        $category_info = ArticleCategory::where(['slug' => $request->slug])->remember(100800)->first()->toArray();

        $articles = $articles->where(['category_1' => $category_info['id']])->remember(100800)->orderBy('id', 'desc')->paginate(25);

        $links = $articles->links();

        $category = ArticleCategory::where(['status' => 1, 'level' => 1])->remember(100800)->first()->toArray();

        return view('article', [
            'category' => $category,
            'articles' => $articles,
            'current_category' => $request->slug,
            'links' => $links,
            'category_info' => $category_info,
            'title'=>$category['name'],
            'keywords'=>'励志语录,'.$category['name'],
            'desc'=>'励志语录365网，有关'.$category['name'].'的内容。致力于成为全网最全的励志语录分享站'
        ]);

    }

    public function articleInfo(Request $request)
    {

        $category = ArticleCategory::where(['status' => 1, 'level' => 1])->remember(100800)->get()->toArray();

        $article = Article::where(['slug'=>$request->slug])->first()->toArray();

        $current = ArticleCategory::find($article['category_1']);

        $id = $article['id'] > 10 ? $article['id'] : 10;

        $recommen = Article::where('id','<',$id)->where(['status'=>1])->remember(100800)->orderBy('id','desc')->limit(6)->get()->toArray();

        $article['content'] = str_replace('www.lz13.cn','',$article['content']);

        return view(
            'article-info',[
                'article' => $article,
                'category' => $category,
                'current_category' => $current->slug,
                'recommen' => $recommen,
                'title' => $article['seo_title'],
                'keywords' => $article['seo_keywords'],
                'desc' => $article['seo_describe'],
            ]
        );

    }

    public function seo()
    {

        $seo = new Seo();

//        $seo->sitemap();

        $seo->pushUrl();

        return;

    }

}
