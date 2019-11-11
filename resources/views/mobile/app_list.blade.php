@extends('layouts.mobile')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/mobile/app_list.css?v='.config('app.version'))}}" />
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
        <div id="content" style="min-height: 750px;margin-top: 10px;">
            <!--主体左侧-->
            <div id="content_left">

                <div class="app-categories-simple">
                    <div class="section-title">
                        <h3>{{ $category_info['name'] }}</h3>
                        <a href="{{ route('app.list',['slug'=>$category_info['slug']]) }}" class="pull-right">更多</a>
                    </div>
                    <div class="taptap-app-list one-line swiper-wrapper">
                        @foreach($apps as $vk => $vv)
                        <div class="taptap-app-item swiper-slide">
                            <a href="{{ route('app.info',['slug'=>$vv['slug']]) }}" class="app-item-image taptap-link">
                                <img src="{{ $vv['thumb'] }}" alt="{{ $vv['name'] }}" title="{{ $vv['name'] }}">
                            </a>
                            <div class="app-item-caption">
                                <a class="item-caption-title" href="{{ route('app.info',['slug'=>$vv['slug']]) }}" title="{{ $vv['name'] }}">
                                    <h4 class="flex-text">{{ $vv['name'] }}</h4>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
