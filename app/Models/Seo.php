<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use QL\QueryList;

class Seo extends PublicModel
{

    public function sitemap()
    {

        // create new sitemap object
        $sitemap = App::make("sitemap");
        $sitemap->setCache('laravel.sitemap', 60);

        $time = date('Y-m-d H:i:s', time());

        $sitemap->add("https://www.5aizhuanqian.com", $time, 1.0, 'daily');

        $sitemap->add("https://www.5aizhuanqian.com/app.html", $time, 0.9, 'daily');

        $sitemap->add("https://www.5aizhuanqian.com/news.html", $time, 0.9, 'daily');

        $apps = Apps::where(['status' => 1])->get()->toArray();

        foreach ($apps as $k => $v) {

            $sitemap->add(route('app.info', ['slug' => $v['slug']]), $time, 0.7, 'daily');

        }

        $news = Article::where(['status' => 1])->get()->toArray();

        foreach ($news as $k => $v) {

            $sitemap->add(route('news.info', ['slug' => $v['slug']]), $time, 0.7, 'daily');

        }

        $categories = Category::where(['status' => 1])->get()->toArray();

        foreach ($categories as $k => $v) {

            $sitemap->add(route('app.list', ['slug' => $v['slug']]), $time, 0.8, 'daily');

        }

        $news_categories = ArticleCategory::where(['status' => 1])->get()->toArray();

        foreach ($news_categories as $k => $v) {

            $sitemap->add(route('news.list', ['slug' => $v['slug']]), $time, 0.8, 'daily');

        }

        $xml = $sitemap->render('xml');

        $path = public_path() . "\sitemap.xml";
        $path = str_replace('\\', '/', $path);

        file_put_contents($path, $xml->getContent());

        return;

    }

    public function pushUrl()
    {
        $urls = array();

        $urls[] = "https://www.5aizhuanqian.com";

        $urls[] = "https://www.5aizhuanqian.com/app.html";

        $urls[] = "https://www.5aizhuanqian.com/news.html";

        $apps = Apps::where(['status' => 1])->get()->toArray();

        foreach ($apps as $k => $v) {

            $urls[] = route('app.info', ['slug' => $v['slug']]);

        }

        $news = Article::where(['status' => 1])->get()->toArray();

        foreach ($news as $k => $v) {

            $urls[] = route('news.info', ['slug' => $v['slug']]);

        }

        $categories = Category::where(['status' => 1])->get()->toArray();

        foreach ($categories as $k => $v) {

            $urls[] = route('app.list', ['slug' => $v['slug']]);

        }

        $news_categories = ArticleCategory::where(['status' => 1])->get()->toArray();

        foreach ($news_categories as $k => $v) {

            $urls[] = route('news.list', ['slug' => $v['slug']]);

        }

        $api = 'http://data.zz.baidu.com/urls?site=https://www.5aizhuanqian.com&token=ublJMuNlBVDcTdmH';
        $ch = curl_init();
        $options = array(
            CURLOPT_URL => $api,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => implode("\n", $urls),
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
        );

        curl_setopt_array($ch, $options);

        $result = curl_exec($ch);
        echo $result;
        $api = 'http://data.zhanzhang.sm.cn/push?site=www.5aizhuanqian.com&user_name=18661139072@163.com&resource_name=mip_add&token=TI_ec3297e4afcc36ecb6761b6dd87e3bf1';
        $ch = curl_init();
        $options = array(
            CURLOPT_URL => $api,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => implode("\n", $urls),
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
        );
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        echo $result;
        return;

    }

    public function getNews()
    {

        set_time_limit(0);
        ini_set('memory_limit', '1024M');

        $news = Article::where(['status' => 2,'category_1'=>3])->orderBy('id','asc')->first();

        if (empty($news)) {
            return;
        }

        Article::where(['status'=>1,'content'=>''])->delete();

        $count = Article::where(['url'=>$news['url']])->count();

        if($count > 1){
            Article::where(['url'=>$news['url']])->where('id','!=',$news['url'])->delete();
        }

        Article::find($news['id'])->update(['status'=>1]);

        $data = QueryList::get($news['url'])->rules([
            'title' => array('h1', 'text'),
            'content' => array('.PostContent>p', 'text'),
            "kw" => array("meta[name=keywords]", "content"),
            "desc" => array("meta[name=desciption]", "content"),
        ])->queryData();

        $content = $title = $kw = $desc = $origin_content = $current_content = '';

        foreach ($data as $vk => $vv) {

            if (!empty($vv['title'])) {
                $title = $this->fakeContent($vv['title']);
            }

            if (!empty($vv['kw'])) {
                $kw = $this->fakeContent($vv['kw']);
            }

            if (!empty($vv['desc'])) {
                $desc = $this->fakeContent($vv['desc']);
            }

            if (!empty($vv['content'])) {
                if(mb_strlen($vv['content']) > 1600){
                    $current_content = $this->fakeContent(mb_substr($vv['content'],0,800));
                    $content .= '<p>' . $current_content . '</p>';
                    $origin_content .= $current_content;
                    sleep(1);
                    $current_content = $this->fakeContent(mb_substr($vv['content'],801,800));
                    $content .= '<p>' . $current_content . '</p>';
                    $origin_content .= $current_content;
                    sleep(1);
                    $current_content = $this->fakeContent(mb_substr($vv['content'],1601,800));
                    $content .= '<p>' . $current_content . '</p>';
                    $origin_content .= $current_content;
                    sleep(1);
                }elseif(mb_strlen($vv['content']) > 800){
                    $current_content = $this->fakeContent(mb_substr($vv['content'],0,800));
                    $content .= '<p>' . $current_content . '</p>';
                    $origin_content .= $current_content;
                    sleep(1);
                    $current_content = $this->fakeContent(mb_substr($vv['content'],801,800));
                    $content .= '<p>' . $current_content . '</p>';
                    $origin_content .= $current_content;
                    sleep(1);
                }else{
                    $current_content = $this->fakeContent($vv['content']);
                    $content .= '<p>' . $current_content . '</p>';
                    $origin_content .= $current_content;
                }

            }

            sleep(1);

        }

        if ($title != '') {

            Article::find($news['id'])->update([
                'name' => $title,
                'content' => $content,
                'seo_title' => $title,
                'seo_keywords' => $kw ? $kw : '励志语录',
                'seo_describe' => $desc ? $desc : mb_substr($origin_content, 0, 80),
                'status' => 1,
                'slug' => implode('-', pinyin($title))
            ]);

        }else{

            Article::find($news['id'])->delete();

        }

        return;

    }

}
