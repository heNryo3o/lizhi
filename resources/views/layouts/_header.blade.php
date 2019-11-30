<div class="mdui-appbar-with-toolbar mdui-theme-accent-pink">
    <div class="mdui-appbar mdui-appbar-fixed">
        <div class="mdui-toolbar mdui-color-white mdui-color-theme">
            <button mdui-drawer="{target: '.mc-drawer', swipe: true}"
                    class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white"><i class="mdui-icon material-icons">menu</i>
            </button>
            <a class="mdui-typo-headline" href="{{ route('/') }}"><h1 class="head-title">励志语录365</h1></a>
            <div class="mdui-toolbar-spacer"></div>
        </div>
    </div>
    <div class="mc-drawer mdui-drawer">
        <div class="mdui-list">
            <a class="mdui-list-item mdui-ripple {{ if_route('/') ? 'mdui-list-item-active mdui-text-color-theme' : '' }} " href="{{ route('/') }}">
                <div class="mdui-list-item-content"><h3>首页</h3></div>
            </a>
            @foreach($category as $k => $v)
            <a class="mdui-list-item mdui-ripple {{ $v['slug'] == $current_category ? 'mdui-list-item-active mdui-text-color-theme' : '' }}" href="{{ route('article.list',['slug'=>$v['slug']]) }}">
                <div class="mdui-list-item-content">
                    <h3>{{ $v['name'] }}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>

