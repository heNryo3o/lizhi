<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>智能AI文章伪原创</title>
    <meta name="Keywords" content="伪原创,伪原创检测,在线伪原创,文章伪原创,伪原创工具" />
    <meta name="Description" content=" 新源代智能AI文章伪原创是专门生成原创及伪原创文章的在线工具，用不念智能AI文章伪原创工具可以把在互联网上复制的文章瞬间变成原创文章。本工具是一款免费的专通过伪原创工具生成的文章，会更好的被搜索引擎收录和索引到。此工具适合中,小型网站站长、网站编辑，网站将一直持续更新算法，为您更好的服务！" />
    <link rel="stylesheet" href="{{ asset('css/bulma.css') }}" />
    <script type="text/javascript">
        function clearBox(){
            document.getElementById('content').value = "";
        };
    </script>
</head>
<body>
<section class="hero">
    <div class="hero-head">
        <header class="nav">
            <div class="container">
                <div class="nav-left">
                    <a class="nav-item" href="http://www.enboo.cn/">  开源之家智能AI文章伪原创</a>
                </div>
            </div>
        </header>
    </div>

    <div class="hero-body">
        <div class="container">
            <div class="columns">

                <div class="column is-10">
                    <h1 class="title is-info"> 开源之家智能AI文章伪原创</h1>
                    <h2 class="subtitle is-info">测试版本V0.1</h2>
                    <div class="field is-horizontal is-info">
                        <div class="field-body is-info">
                            <div class="field">
                                <div class="control">
                                    <textarea class="textarea" placeholder=" 开源之家提示：请输入最多不超过2000个字，进行伪原创！" rows="12" id="content" autofocus=""></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field is-grouped is-grouped-multiline">
                        <span class="tag">您可输入</span>
                        <div class="control">
                            <div class="tags has-addons">
                                <span class="tag is-success">2000</span>
                                <span class="tag is-primary">个字符</span>
                            </div>
                        </div>
                        <span class="tag">以输入</span>
                        <div class="control">
                            <div class="tags has-addons">
                                <span class="tag is-warning" id="zishu">0</span>
                                <span class="tag is-success">个字符</span>
                            </div>
                        </div>
                        <span class="tag">还可以输入</span>
                        <div class="control">
                            <div class="tags has-addons">
                                <span class="tag is-warning" id="shengyu">2000</span>
                                <span class="tag is-danger ">个字符</span>
                            </div>
                        </div>

                    </div>


                    <div class="field is-grouped is-grouped-right">
                        <p class="control"> <a  href="javascript:void(0)" class="button is-primary" id="button" type="button" onclick="answers()"> 进行AI伪原创 </a> </p>
                        <p class="control"> <a class="button is-light" id="reset" type="reset" value="重新输入" name="reset" onclick="clearBox();"> 重新输入 </a> </p>
                    </div>

                    <div class="field-body is-info">
                        <div class="field">
                            <div class="control">
                                <textarea class="textarea" placeholder="不念智能AI文章伪原创内容" rows="12" id = "reply" autofocus=""></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    ::-webkit-scrollbar {
        width: 4px;
        height: 4px;
    }
    ::-webkit-scrollbar-thumb {
        border-radius: 5px;
        -webkit-box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
        background: rgba(0, 0, 0, 0.2);
    }
    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
        border-radius: 0;
        background: rgba(0, 0, 0, 0.1);
    }
</style>
<script charset="utf-8" src="{{ asset('js/fake.js') }}"></script>
<!--GIThub地址https://github.com/bunian/Pseudo-original-->
</body>
</html>
