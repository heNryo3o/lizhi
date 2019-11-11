@extends('layouts.mobile')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/mobile/index.css?v='.config('app.version'))}}" />
@stop
@section('content')
    <div>
        <div id="slider" class="mui-slider">
            <div class="mui-slider-group mui-slider-loop">
                <!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
                @foreach($banners as $k => $v)
                <div class="mui-slider-item mui-slider-item-duplicate">
                    <a href="{{ $v['url'] }}">
                        <img src="{{ $v['thumb'] }}">
                        <p class="mui-slider-title">{{ $v['name'] }}</p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <div id="content">
            <!--主体左侧-->
            <div id="content_left">
                @foreach($category as $k => $v)
                <div class="app-categories-simple">
                    <div class="section-title">
                        <h3>{{ $v['name'] }}</h3>
                        <a href="{{ $v['slug'] ? route('app.list',['slug'=>$v['slug']]) : route('app') }}" class="pull-right">更多</a>
                    </div>
                    <div class="taptap-app-list one-line swiper-wrapper">
                        @foreach($v['apps'] as $vk => $vv)
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
                @endforeach
            </div>
        </div>
    </div>
@stop
@section('js')
    <script type="text/javascript" src="{{ asset('plugins/mui/js/mui.min.js') }}"></script>
    <script>
        mui.init({
            swipeBack:true //启用右滑关闭功能
        });
        var slider = mui("#slider");
        slider.slider({
            interval: 3000
        });
    </script>
@stop
