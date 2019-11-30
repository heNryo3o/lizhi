@extends('layouts.default')

@section('content')
    <div class="mdui-container">
        <div class="mdui-col-xs-12 mdui-col-md-12 mdui-m-t-4">
            <div class="mdui-card mdui-shadow-3 mdui-hoverable">
                <div class="mdui-card-primary">
                    <div class="mdui-card-primary-title"><a class="color-ff" href="/">{{ $article['name'] }}</a></div>
                    <div class="mdui-card-primary-subtitle">{{ $article['updated_at'] }}</div>
                </div>
                <div class="mdui-card-content">
                    {!! $article['content'] !!}
                </div>
            </div>
        </div>
        <div class="mdui-col-xs-12 mdui-col-md-12 mdui-m-t-4 mdui-m-b-4">
            <div class="mdui-card mdui-shadow-3 mdui-hoverable">
                <div class="mdui-card-primary pd-1016">
                    <div class="mdui-card-primary-title">
                        <button class="mdui-btn mdui-ripple card-btn">
                            <a href="{{ route('/') }}">
                                相关文章
                            </a>
                        </button>
                    </div>
                </div>
                <div class="mdui-card-content card-content-pd">
                    @foreach($recommen as $k => $v)
                        <p class="mdui-text-truncate">
                            <a href="{{ route('article.info',['slug'=>$v['slug']]) }}">
                                <button class="mdui-btn mdui-ripple">
                                    {{ $v['name'] }}
                                </button>
                            </a>
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop

