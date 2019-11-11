@extends('layouts.mobile')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/mobile/news.css?v='.config('app.version'))}}"/>
@stop
@section('content')
    <div class="breadcrumb">
        <div class="breadcrumb-container">
            <span>你的位置：</span>
            <a href="{{ route('/') }}">
                <span>首页</span>
            </a>
            <span>/</span>
            <a href="{{ route('news') }}">
                <span>资讯</span>
            </a>
        </div>
    </div>
    <div>
        <div id="content" style="min-height: 750px;margin-top: 10px;">
            <!--主体左侧-->
            <div id="content_left">
                <div class="forum-top-tab">
                    <ul class="nav nav-pills taptap-pills-nav common-box-card">
                        <li class="{{ empty($current_category) ? 'active' : '' }} js-active-feed-term"><a
                                href="{{ route('news') }}">推荐</a>
                        </li>
                        @foreach($news_category as $k => $v)
                            <li class="{{ $current_category == $v['slug'] ? 'active' : '' }} js-active-feed-term"><a href="{{ route('news.list',['slug'=>$v['slug']]) }}">{{ $v['name'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="news-content">
                    @foreach($news as $k => $v)
                        <div class="news-card">
                            <a href="{{ route('news.info',['slug'=>$v['slug']]) }}">
                                <div class="thumb-container">
                                    <img src="{{ $v['thumb'] }}"/>
                                </div>
                            </a>
                            <a href="{{ route('news.info',['slug'=>$v['slug']]) }}">
                                <div class="content-container">
                                    <div class="title">
                                        <span>{{ $v['name'] }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="pagination-container">
                        {{ $links }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
