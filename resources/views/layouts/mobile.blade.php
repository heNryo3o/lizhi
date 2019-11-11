<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="toTop" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="author" content="yugaoheng"/>
    <meta name="generator" content="yugaoheng"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>我爱赚钱网|{{ isset($title) && $title ? $title : '网上赚钱就来我爱赚钱网' }}</title>
    <meta name="keywords" content="{{ isset($keywords) && $keywords ? $keywords : '网上赚钱,赚钱小项目,什么游戏可以赚钱，怎么赚钱' }}" />
    <meta name="description" content="{{ isset($desc) && $desc ? $desc : '我爱赚钱网（5aizhuanqian.com）致力于分享网上赚钱,赚钱小项目,什么游戏可以赚钱，怎么赚钱相关内容，想知道怎么赚钱，就来我爱赚钱网。每日更新！'}}" />

    <link rel="icon" href="{{ asset('favicon.ico') }}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/mobile/common.css?v='.config('app.version'))}}"/>
    <link rel="stylesheet" href="{{ asset('plugins/mui/css/mui.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/menu/css/default.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/menu/css/demo.css') }}">
    @yield('css')
    <script>
        (function(){
            var bp = document.createElement('script');
            var curProtocol = window.location.protocol.split(':')[0];
            if (curProtocol === 'https') {
                bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
            }
            else {
                bp.src = 'http://push.zhanzhang.baidu.com/push.js';
            }
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(bp, s);
        })();
    </script>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?a6598cbc9db6d0a3768cc35066e6ece1";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>

<body>
<div class="screen">
    <div class="circle"></div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('/') }}">首 页</a></li>
            <li><a href="{{ route('app') }}">应 用</a></li>
            <li><a href="{{ route('app.list',['slug'=>'zou-lu-zhuan']) }}">走路赚钱</a></li>
            <li><a href="{{ route('app.list',['slug'=>'an-zhuo-shi-wan']) }}">安卓试玩</a></li>
            <li><a href="{{ route('news') }}">资 讯</a></li>
        </ul>
    </div>
    @include('layouts._mobile_header')
    @yield('content')
    @include('layouts._mobile_footer')
</div>
<script>
    (function(){
        var src = "https://jspassport.ssl.qhimg.com/11.0.1.js?d182b3f28525f2db83acfaaf6e696dba";
        document.write('<script src="' + src + '" id="sozz"><\/script>');
    })();
</script>
</body>
<script type="text/javascript" src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset('js/stopExecutionOnTimeout.js') }}"></script>
<script>
    if ('ontouchstart' in window) {
        var click = 'touchstart';
    } else {
        var click = 'click';
    }
    $('div.burger').on(click, function () {
        if (!$(this).hasClass('open')) {
            openMenu();
        } else {
            closeMenu();
        }
    });
    function openMenu() {
        $('div.circle').addClass('expand');
        $('div.burger').addClass('open');
        $('div.x, div.y, div.z').addClass('collapse');
        $('.menu li').addClass('animate');
        setTimeout(function () {
            $('div.y').hide();
            $('div.x').addClass('rotate30');
            $('div.z').addClass('rotate150');
        }, 70);
        setTimeout(function () {
            $('div.x').addClass('rotate45');
            $('div.z').addClass('rotate135');
        }, 120);
    }
    function closeMenu() {
        $('div.burger').removeClass('open');
        $('div.x').removeClass('rotate45').addClass('rotate30');
        $('div.z').removeClass('rotate135').addClass('rotate150');
        $('div.circle').removeClass('expand');
        $('.menu li').removeClass('animate');
        setTimeout(function () {
            $('div.x').removeClass('rotate30');
            $('div.z').removeClass('rotate150');
        }, 50);
        setTimeout(function () {
            $('div.y').show();
            $('div.x, div.y, div.z').removeClass('collapse');
        }, 70);
    }

</script>

@yield('js')
</html>
