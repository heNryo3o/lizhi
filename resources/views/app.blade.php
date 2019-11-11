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
        </div>
    </div>
    <div>
        <div id="content">
            <!--主体左侧-->
            <div id="content_left">
                @foreach($category as $k => $v)
                    <div class="app-categories-simple">
                        <div class="section-title">
                            <h3>{{ $v['name'] }}</h3>
                            <a href="{{ route('app.list',['slug'=>$v['slug']]) }}" class="pull-right">更多</a>
                        </div>
                        <div class="taptap-app-list one-line swiper-wrapper">
                            @foreach($v['apps'] as $vk => $vv)
                                <div class="taptap-app-item swiper-slide">
                                    <a href="{{ route('app.info',['slug'=>$vv['slug']]) }}" class="app-item-image taptap-link">
                                        <img src="{{ $vv['thumb'] }}" alt="{{ $vv['name'] }}" title="{{ $vv['name'] }}">
                                    </a>
                                    <div class="app-item-caption">
                                        <a class="item-caption-title flex-text-overflow taptap-link" href="{{ route('app.info',['slug'=>$vv['slug']]) }}" title="{{ $vv['name'] }}">
                                            <h4 class="flex-text">{{ $vv['name'] }}</h4>
                                        </a>
                                        <span class="item-caption-label">
                                    <a href="{{ route('app.info',['slug'=>$vv['slug']]) }}" class="taptap-link">{{ $vv['category_name'] }}</a>
                                </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            @include('layouts._right')
        </div>
    </div>
@stop
