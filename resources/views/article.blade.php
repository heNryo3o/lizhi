@extends('layouts.default')

@section('content')
    <div class="mdui-container">
        <div class="mdui-col-xs-12 mdui-col-md-12 mdui-m-t-4">
            <div class="mdui-card mdui-shadow-3 mdui-hoverable">
                <div class="mdui-card-primary" style="padding: 10px 16px;">
                    <div class="mdui-card-primary-title">
                        <button class="mdui-btn mdui-ripple" style="font-size: 22px;color: #5D4037;">
                            <a href="{{ route('article.list',['slug'=>$category_info['slug']]) }}">
                                {{ $category_info['name'] }}
                            </a>
                        </button>
                    </div>
                </div>
                <div class="mdui-card-content" style="padding: 0 14px 10px 14px;">
                    @foreach($articles as $k => $v)
                        <p>
                            <a href="{{ route('article.info',['slug'=>$v['slug']]) }}">
                                <button class="mdui-btn mdui-ripple">
                                    {{ $v['name'] }}
                                </button>
                            </a>
                        </p>
                    @endforeach
                    <div class="pagination-container">
                        {{ $links }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

