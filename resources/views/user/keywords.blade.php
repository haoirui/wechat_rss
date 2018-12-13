@extends('user.layouts.app')
@section('title', '订阅设置')
@section('content')

    <div class="weui-cells__title">建议关键词：nginx php 漏洞预警</div>
    <div class="weui-cells">
        <form action="" method="post">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <input class="weui-input" name="keyword" type="text" onkeydown="if(event.keyCode==13){return false;}" placeholder="请输入要监控的关键词">
                </div>
                {{ csrf_field() }}
                <div class="weui-cell__ft">
                    <a class="weui-vcode-btn" href="#" onclick="add_keyword()">添加</a>
                </div>
            </div>
        </form>
    </div>

    <div class="weui-panel">
        <div class="weui-panel__hd">
            已订阅的关键词/左滑删除
        </div>
        <div class="weui-cell__bd" style="transform: translate3d(0px, 0px, 0px);">

            @foreach($keywords as $keyword)
            <div class="weui-cell weui-cell_swiped">
                <div class="weui-cell__bd">
                    <div class="weui-cell">
                        <div class="weui-cell__bd">
                            <p>{{ $keyword->keyword }}</p>
                        </div>
                    </div>
                </div>
                <div class="weui-cell__ft" style="right:15px;top:10px;bottom:10px">
                    <a class="weui-swiped-btn weui-swiped-btn_warn delete-swipeout" href="{{ url('/user/keyword_del',['id'=>$keyword->id]) }}">删除</a>
                </div>
            </div>
            @endforeach

        </div>

    </div>




@endsection
@section('footer_js')
    <script src="https://cdn.bootcss.com/jquery-weui/1.2.1/js/jquery-weui.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery-weui/1.2.1/js/swiper.min.js"></script>
    <script src="/js/weui.min.js"></script>
    <script src="/vendor/layer_mobile/layer.js"></script>
    <script>
        function add_keyword() {
            $.ajax({
                method: 'POST',
                data: $('form').serialize(),
                success: function(data){
                    if(data.code === 0){
                        layer.open({
                            content: data.msg,
                            skin: 'msg',
                            time: 2,
                            end: function () {
                                window.location.reload()
                            }
                        })
                    }else{
                        layer.open({
                            content: data.error,
                            skin: 'msg',
                            time: 2,
                            end: function () {
                                window.location.reload()
                            }
                        })
                    }
                }
            })
        }
    </script>

@endsection