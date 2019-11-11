@extends('layouts.default')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/skitter.styles.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/index.css?v='.config('app.version'))}}" />
@stop
@section('content')
    <div>
        <div id="outerslider">
            <div id="slidercontainer">
                <section id="slider">
                    <div class="box_skitter box_skitter_large">
                        <ul>
                            @foreach($banners as $k => $v)
                            <li>
                                <a target="_blank" href="{{ $v['url'] }}">
                                    <img src=" {{ $v['thumb'] }} " alt="{{ $v['name'] }}" />
                                    <div class="label_text">
                                        <span>{{ $v['name'] }}</span>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            </div>
        </div>
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
@section('js')
    <script type="text/javascript" src="{{ asset('js/jquery-1.6.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.animate-colors-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.slider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
@stop
