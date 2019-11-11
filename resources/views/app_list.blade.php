@extends('layouts.default')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/index.css?v='.config('app.version'))}}" />
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
                <span>{{ $category_info['name'] }}</span>
            </a>
        </div>
    </div>
    <div>
        <div id="content">
            <!--主体左侧-->
            <div id="content_left">
                <div class="app-categories-simple">
                    <div class="section-title">
                        <h3>{{ $category_info['name'] }}</h3>
                    </div>
                    <div class="taptap-app-list one-line swiper-wrapper">
                        @foreach($apps as $k => $v)
                        <div class="taptap-app-item swiper-slide">
                            <a href="{{ route('app.info',['slug'=>$v['slug']]) }}" class="app-item-image taptap-link">
                                <img src="{{ $v['thumb'] }}" alt="{{ $v['name'] }}" title="{{ $v['name'] }}">
                            </a>
                            <div class="app-item-caption">
                                <a class="item-caption-title flex-text-overflow taptap-link" href="{{ route('app.info',['slug'=>$v['slug']]) }}" title="{{ $v['name'] }}">
                                    <h4 class="flex-text">{{ $v['name'] }}</h4>
                                </a>
                                <span class="item-caption-label">
                                    <a href="{{ route('app.info',['slug'=>$v['slug']]) }}" class="taptap-link">{{ $v['category_name'] }}</a>
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @include('layouts._right')
        </div>
    </div>
@stop
