<footer>
    <div class="mdui-container text-center text-center">
        <div class="footer-copyright">励志语录365网致力于分享励志名言,名人名言,励志电影,励志歌曲,经典语录,经典语句相关内容。以成为中国最好的分享励志语句的网站为目标，不断优化使用体验。励志，从这里开始！</div>
        <div class="footer-copyright">Copyright © 2019 <a href="{{ route('/') }}">励志语录365网</a> All rights reserved.</div>
        <div class="footer-copyright">友情链接：
            @foreach(config('app.friend_links') as $k => $v)
                <a href="{{ $v['url'] }}" target="_blank" class="mdui-m-r-1">{{ $v['name'] }}</a>
            @endforeach
        </div>
        <div class="footer-copyright">
            <a href="https://www.lzyl365.com/sitemap.xml" target="_blank">网站地图</a>
        </div>
    </div>
</footer>
