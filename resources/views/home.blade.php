@extends('layouts.default')

@section('content')
    <div class="mdui-container">
        @foreach($category as $k => $v)
        <div class="mdui-col-xs-12 mdui-col-md-6 mdui-m-t-4">
            <div class="mdui-card mdui-shadow-3 mdui-hoverable">
                <div class="mdui-card-primary pd-1016">
                    <div class="mdui-card-primary-title">
                        <button class="mdui-btn mdui-ripple card-btn">
                            <a href="{{ route('article.list',['slug'=>$v['slug']]) }}">
                                {{ $v['name'] }}
                            </a>
                        </button>
                    </div>
                </div>
                <div class="mdui-card-content card-content-pd">
                    @foreach($v['articles'] as $vk => $vv)
                    <p class="mdui-text-truncate">
                        <a href="{{ route('article.info',['slug'=>$vv['slug']]) }}">
                            <button class="mdui-btn mdui-ripple">
                                {{ $vv['name'] }}
                            </button>
                        </a>
                    </p>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
@stop

