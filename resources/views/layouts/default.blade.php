<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="toTop" content="true">
    <meta name="shenma-site-verification" content="3fb78625000b79a3c583a43d15f94df8_1573527400"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="yugaoheng" />
    <meta name="generator" content="yugaoheng" />
    <meta name="applicable-device" content="pc">
    <title>励志语录365网{{ isset($title) && $title ? ' - '.$title : '励志名言,名人名言,励志电影,励志歌曲,经典语录,经典语句' }}</title>
    <meta name="keywords" content="{{ isset($keywords) && $keywords ? '励志语录,'.$keywords : '励志名言,名人名言,励志电影,励志歌曲,经典语录,经典语句' }}" />
    <meta name="description" content="{{ isset($desc) && $desc ? $desc : '励志语录365网致力于分享励志名言,名人名言,励志电影,励志歌曲,经典语录,经典语句相关内容。以成为中国最好的分享励志语句的网站为目标，不断优化使用体验。励志，从这里开始！'}}" />

    <link rel="icon" href="{{ asset('favicon.ico') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/common.css?v='.config('app.version'))}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/mdui/css/mdui.css?v='.config('app.version'))}}" />
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
            hm.src = "https://hm.baidu.com/hm.js?4799e9ec30e2ecbbb37cf67458be1079";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>

<body class="mdui-drawer-body-left mdui-theme-primary-brown">
    @include('layouts._header')

    @yield('content')

    @include('layouts._footer')
<script>
    (function(){
        var src = "https://jspassport.ssl.qhimg.com/11.0.1.js?d182b3f28525f2db83acfaaf6e696dba";
        document.write('<script src="' + src + '" id="sozz"><\/script>');
    })();
</script>
<script src="{{ asset('plugins/mdui/js/mdui.js') }}"></script>
<script>

</script>
</body>
{{--<script type="text/javascript" src="{{asset('plugins/jquery/jquery.js')}}" ></script>--}}
@yield('js')
</html>
