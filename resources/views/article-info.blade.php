@extends('layouts.default')

@section('content')
    <div class="mdui-container">
        <div class="mdui-col-xs-12 mdui-col-md-12 mdui-m-t-4">
            <div class="mdui-card mdui-shadow-3 mdui-hoverable">
                <div class="mdui-card-primary">
                    <div class="mdui-card-primary-title"><a style="color: #FF5722;" href="/">{{ $article['name'] }}</a></div>
                    <div class="mdui-card-primary-subtitle">{{ $article['updated_at'] }}</div>
                </div>
                <div class="mdui-card-content">
                    {!! $article['content'] !!}
                </div>
            </div>
        </div>
        <div class="mdui-col-xs-12 mdui-col-md-12 mdui-m-t-4 mdui-m-b-4">
            <div class="mdui-card mdui-shadow-3 mdui-hoverable">
                <div class="mdui-card-primary" style="padding: 10px 16px;">
                    <div class="mdui-card-primary-title">
                        <button class="mdui-btn mdui-ripple" style="font-size: 22px;color: #5D4037;">
                            <a href="{{ route('/') }}">
                                相关文章
                            </a>
                        </button>
                    </div>
                </div>
                <div class="mdui-card-content" style="padding: 0 14px 10px 14px;">
                    @foreach($recommen as $k => $v)
                        <p>
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

