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

        $sitemap->add(route('/'), $time, 1.0, 'daily');

        $articles = Article::where(['status' => 1])->get()->toArray();

        foreach ($articles as $k => $v) {

            $sitemap->add(route('article.info', ['slug' => $v['slug']]), $time, 0.8, 'daily');

        }

        $categories = ArticleCategory::where(['status' => 1])->get()->toArray();

        foreach ($categories as $k => $v) {

            $sitemap->add(route('article.list', ['slug' => $v['slug']]), $time, 0.9, 'daily');

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

        $urls[] = route('/');

        $categories = ArticleCategory::where(['status' => 1])->get()->toArray();

        foreach ($categories as $k => $v) {

            $urls[] = route('article.list', ['slug' => $v['slug']]);

        }

        $articles = Article::where(['status' => 1])->get()->toArray();

        foreach ($articles as $k => $v) {

            $urls[] = route('article.info', ['slug' => $v['slug']]);

        }

        $api = 'http://data.zz.baidu.com/urls?site=https://www.lzyl365.com&token=ublJMuNlBVDcTdmH';
        $ch = curl_init();
        $options = array(
            CURLOPT_URL => $api,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => implode("\n", $urls),
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
        );

        curl_setopt_array($ch, $options);

        $result1 = curl_exec($ch);


        $api = 'http://data.zhanzhang.sm.cn/push?site=www.lzyl365.com&user_name=18661139072@163.com&resource_name=mip_add&token=TI_5732fb95fbb250608a99ae9cc8b9bb6a';
        $ch = curl_init();
        $options =  array(
            CURLOPT_URL => $api,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => implode("\n", $urls),
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
        );
        curl_setopt_array($ch, $options);
        $result2 = curl_exec($ch);
        echo $result1.' '.$result2;
        return;

    }

    public function getNews()
    {

        set_time_limit(0);
        ini_set('memory_limit', '1024M');

        $news = Article::where(['status' => 2,'category_1'=>5])->orderBy('id','asc')->first();

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
