<div class="nav">
    <div class="container">
        <div class="head">
            <div class="con">
                <div class="navbar-brand">
                    <div>
                        <a href="{{ route('/') }}"><span>我爱赚钱网</span></a>
                    </div>
                </div>
                <ul class="navbar-left">
                    <li class="{{ if_route('/') ? 'head-nav-active' : '' }}"><a href="{{ route('/') }}">首页</a></li>
                    <li><a class="{{ if_route('app') || if_route('app.info') || if_route('app.list') ? 'head-nav-active' : '' }}" href="{{ route('app') }}">应用</a></li>
                    <li class="{{ if_route('news') || if_route('news.info') || if_route('news.list') ? 'head-nav-active' : '' }}"><a href="{{ route('news') }}">资讯</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
