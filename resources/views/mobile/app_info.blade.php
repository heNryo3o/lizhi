@extends('layouts.mobile')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/mobile/app_info.css?v='.config('app.version'))}}" />
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
        <div id="content" style="min-height: 750px;margin-top: 10px;">
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
                                <span>
                                    <a href="{{ $info['url'] }}" target="_blank">
                                        <button type="button" class="mui-btn mui-btn-warning">
                                            前往下载
                                        </button>
                                    </a>
                                </span>
                            </div>
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
        </div>
    </div>
@stop
