@extends('layouts.default')

@section('content')
    <div class="mdui-container">
        <div class="mdui-col-xs-12 mdui-col-md-12 mdui-m-t-4">
            <div class="mdui-card mdui-shadow-3 mdui-hoverable">
                <div class="mdui-card-primary pd-1016">
                    <div class="mdui-card-primary-title">
                        <button class="mdui-btn mdui-ripple card-btn">
                            <a href="{{ route('article.list',['slug'=>$category_info['slug']]) }}">
                                {{ $category_info['name'] }}
                            </a>
                        </button>
                    </div>
                </div>
                <div class="mdui-card-content card-content-pd">
                    @foreach($articles as $k => $v)
                        <p class="mdui-text-truncate">
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

