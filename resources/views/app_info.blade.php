@extends('layouts.default')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css?v='.config('app.version'))}}" />
    <link rel="stylesheet" href="{{ asset('plugins/share/css/share.min.css') }}">
@stop
@section('content')
    <div class="breadcrumb">
        <div class="breadcrumb-container">
            <span>你的位置：</span>
            <a href="{{ route('/') }}">
                <span>首页</span>
            </a>
            <span>/</span>
            <a href="{{ route('app') }}">
                <span>应用</span>
            </a>
            <span>/</span>
            <a href="{{ route('app.list',['slug'=>$category_info['slug']]) }}">
                <span>{{ $info['category_name'] }}</span>
            </a>
            <span>/</span>
            <a href="{{ route('app.info',['slug'=>$info['slug']]) }}">
                <span>{{ $info['name'] }}</span>
            </a>
        </div>
    </div>
    <div>
        <div id="content">
            <!--主体左侧-->
            <div id="content_left">
                <div class="app-content">
                    <div class="app-card">
                        <div class="thumb-container">
                            <img src="{{ $info['thumb'] }}" />
                        </div>
                        <div class="info-container">
                            <div class="title">
                                <span>{{ $info['name'] }}</span>
                            </div>
                            <div class="date">
                                <span>{{ $info['created_at'] }}</span>
                            </div>
                            <div class="share-container">
                                <div class="social-share" data-disabled="wechat , facebook, twitter, google, diandian, tencent"></div>
                            </div>
                            <div class="content">
                                <span>分类：<a href="{{ route('app.list',['slug'=>$category_info['slug']]) }}">{{ $info['category_name'] }}</a></span>
                            </div>
                        </div>
                        <div class="code-container">
                            <img src="{{ $info['code'] }}" />
                            <span>扫描二维码，快速下载本应用</span>
                        </div>
                    </div>
                </div>
                <div class="app-main">
                    <div class="app-header">
                        <span>简介：</span>
                    </div>
                    <div class="app-desc">
                        <span>{!! $info['content'] !!}</span>
                    </div>
                </div>
                <div class="app-main">
                    <div class="app-header">
                        <span>截图：</span>
                    </div>
                    <div class="app-attaches">
                        @foreach($info['attaches'] as $k => $v)
                        <img src="{{ $v['url'] }}" alt="{{ $info['name'] }}" title="{{ $info['name'] }}" />
                        @endforeach
                    </div>
                </div>
            </div>
            @include('layouts._right')
        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('plugins/share/js/jquery.share.min.js') }}"></script>
@stop
