<div class="mdui-appbar-with-toolbar mdui-theme-accent-pink">
    <div class="mdui-appbar mdui-appbar-fixed">
        <div class="mdui-toolbar mdui-color-white mdui-color-theme">
            <button mdui-drawer="{target: '.mc-drawer', swipe: true}"
                    class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white"><i class="mdui-icon material-icons">menu</i>
            </button>
            <a class="mdui-typo-headline" href="{{ route('/') }}"><h1>励志语录365</h1></a>
            <div class="mdui-toolbar-spacer"></div>
        </div>
    </div>
    <div class="mc-drawer mdui-drawer">
        <div class="mdui-list">
            <a class="mdui-list-item mdui-ripple {{ if_route('/') ? 'mdui-list-item-active mdui-text-color-theme' : '' }} " href="{{ route('/') }}">
                <div class="mdui-list-item-content">首页</div>
            </a>
            @foreach($category as $k => $v)
            <a class="mdui-list-item mdui-ripple {{ $v['slug'] == $current_category ? 'mdui-list-item-active mdui-text-color-theme' : '' }}" href="{{ route('article.list',['slug'=>$v['slug']]) }}">
                <div class="mdui-list-item-content">
                    {{ $v['name'] }}
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>

