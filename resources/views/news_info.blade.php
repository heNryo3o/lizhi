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
            <span>/</span>
            <a href="{{ route('news.info',['slug'=>$info['slug']]) }}">
                <span>{{ $info['name'] }}</span>
            </a>
        </div>
    </div>
    <div>
        <div id="content">
            <!--主体左侧-->
            <div id="content_left">
                <div class="news-content">
                    <div class="news-card">
                        <div class="info-container">
                            <div class="title">
                                <span>{{ $info['name'] }}</span>
                            </div>
                            <div class="date">
                                <span>{{ $info['updated_at'] }}</span>
                            </div>
                            <div class="content">
                                <span> {!! $info['content'] !!}</span>
                            </div>
                        </div>
                    </div>
                    <div class="recommen">
                        <div class="recommen-header">
                            <h3>赚钱资讯推荐</h3>
                        </div>
                        <div class="recommen-content">
                            @foreach($recommen as $k => $v)
                            <p><a href="{{ route('news.info',['slug'=>$v['slug']]) }}">{{ $v['name'] }}</a></p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts._right')
        </div>
    </div>
@stop
