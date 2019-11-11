<div id="content_right">
    <!--关注我们-->
    <div class="attent_us">
        <img src="{{ asset('img/code.png') }}">
        <div>
            <span class="attent_us_title">我爱赚钱网</span>
            <p>欢迎关注我们</p>
            <ul id="attent_us">
                <li><a href="javascript:void(0);" title="微信: yu554348768">微信</a></li>
                <li><a rel="nofollow" target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=8275600f94eff81ed729e71ed2fe991b80fdaa04054c14cefc3f140f29c43471">QQ</a></li>
                <li><a rel="nofollow" href="https://www.zhihu.com/people/wo-ai-zhuan-qian-wang/" target="_blank">知乎</a></li>
                <li><a rel="nofollow" href="https://weibo.com/6988446897/profile?rightmod=1&wvr=6&mod=personinfo" target="_blank">微博</a></li>
                <li><a href="javascript:void(0);" title="邮箱: 554348768@qq.com">邮箱</a></li>
            </ul>
        </div>
    </div>
    <!--关注我们结束-->

    <!--排行榜-->
    <div id="leaderboard">
        <h3 class="right_head">
            排行榜
            <a href="{{ route('app') }}">更多</a>
        </h3>
        <div class="leaderboard_content">
            <div class="select_content" id="leaderboard_hot">
                <ul>
                    @foreach($rank as $k => $v)
                        <li>
                            <span class="order">{{ $k+1 }}</span>
                            <a href="{{ route('app.info',['slug'=>$v['slug']]) }}">
                                <img src="{{ $v['thumb'] }}">
                            </a>
                            <div>
                                <a href="{{ route('app.info',['slug'=>$v['slug']]) }}">{{ $v['name'] }}</a>
                                {{ $v['category_name'] }}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div id="hot_game_label">
        <h3 class="right_head">
            热门应用标签
        </h3>
        <hr>
        <div class="hot_game_content">
            <ul>
                @foreach($category as $k => $v)
                    <li><a href="{{ route('app.list',['slug'=>$v['slug']]) }}">{{ $v['name'] }}</a></li>
                @endforeach
            </ul>
            <div class="clearfloat"></div>
        </div>
    </div>
</div>
