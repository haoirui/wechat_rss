@extends('user.layouts.app')
@section('title', '泰式感知')
@section('content')

    <div class="weui-panel weui-panel_access">
        <div class="weui-panel__hd">
            @foreach($my_rss as $rss_push)
                <div class="weui-media-box weui-media-box_text">
                    <h4 class="weui-media-box__title">{{ $rss_push->rss->title }}</h4>
                    <p class="weui-media-box__desc">{{ $rss_push->rss->summary }}</p>
                    <p class="weui-media-box__info">发布时间：{{ $rss_push->rss->pub_date }}</p>
                </div>
            @endforeach
                <center>
                    {{ $my_rss->links() }}
                </center>
        </div>

    </div>




@endsection
@section('footer_js')
    <script>
        $(function(){
            $('.weui-navbar__item').on('click', function () {
                $(this).addClass('weui-bar__item_on').siblings('.weui-bar__item_on').removeClass('weui-bar__item_on');
                $(jQuery(this).attr("href")).show().siblings('.weui-tab__content').hide();
            });
        });

    </script>


@endsection