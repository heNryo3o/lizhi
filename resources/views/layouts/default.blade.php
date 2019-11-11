<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="toTop" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="yugaoheng" />
    <meta name="generator" content="yugaoheng" />
    <meta name="applicable-device" content="pc">
    <title>我爱赚钱网|{{ isset($title) && $title ? $title : '网上赚钱就来我爱赚钱网' }}</title>
    <meta name="keywords" content="{{ isset($keywords) && $keywords ? $keywords : '网上赚钱,赚钱小项目,什么游戏可以赚钱，怎么赚钱' }}" />
    <meta name="description" content="{{ isset($desc) && $desc ? $desc : '我爱赚钱网（5aizhuanqian.com）致力于分享网上赚钱,赚钱小项目,什么游戏可以赚钱，怎么赚钱相关内容，想知道怎么赚钱，就来我爱赚钱网。每日更新！'}}" />

    <link rel="icon" href="{{ asset('favicon.ico') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/common.css?v='.config('app.version'))}}" />
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
@include('layouts._header')

@yield('content')

@include('layouts._footer')
<script>
    (function(){
        var src = "https://jspassport.ssl.qhimg.com/11.0.1.js?d182b3f28525f2db83acfaaf6e696dba";
        document.write('<script src="' + src + '" id="sozz"><\/script>');
    })();
</script>
</body>
{{--<script type="text/javascript" src="{{asset('plugins/jquery/jquery.js')}}" ></script>--}}
@yield('js')
</html>
