@extends('layouts.default')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/news.css?v='.config('app.version'))}}" />
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
        <div id="content">
            <!--主体左侧-->
            <div id="content_left">
                <div class="forum-top-tab">
                    <ul class="nav nav-pills taptap-pills-nav common-box-card">
                        <li class="{{ empty($current_category) ? 'active' : '' }} js-active-feed-term"><a href="{{ route('news') }}">推荐</a>
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
                        <div class="thumb-container">
                            <a href="{{ route('news.info',['slug'=>$v['slug']]) }}">
                                <img src="{{ $v['thumb'] }}" />
                            </a>
                        </div>
                        <div class="content-container">
                            <div class="title">
                                <a href="{{ route('news.info',['slug'=>$v['slug']]) }}">
                                    <span>{{ $v['name'] }}</span>
                                </a>
                            </div>
                            <div class="content">
                                <a href="{{ route('news.info',['slug'=>$v['slug']]) }}">
                                    <span>{{ substr(strip_tags($v['content']),0,210) }}</span>
                                </a>
                            </div>
                            <div class="date">
                                <span>{{ $v['updated_at'] }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="pagination-container">
                        {{ $links }}
                    </div>
                </div>
            </div>
            @include('layouts._right')
        </div>
    </div>
@stop
