<div class="weui_tab footer-menu">
    <div class="weui-tabbar">
        <a href="{{ url('/monitor') }}" class="weui-tabbar__item weui-bar__item--on">
            {{--<span class="weui-badge" style="position: absolute;top: -.4em;right: 1em;">8</span>--}}
            <div class="weui-tabbar__icon">
                <img src="/images/shoucang.png" alt="">
            </div>
            <p class="weui-tabbar__label">我的订阅</p>
        </a>
        <a href="{{ url('/articles') }}" class="weui-tabbar__item">
            <div class="weui-tabbar__icon">
                <img src="/images/anquan.png" alt="">
            </div>
            <p class="weui-tabbar__label">安全舆情</p>
        </a>
        <a href="{{ url('/user/keywords') }}" class="weui-tabbar__item">
            <div class="weui-tabbar__icon">
                <img src="/images/shezhi.png" alt="">
            </div>
            <p class="weui-tabbar__label">订阅设置</p>
        </a>
        {{--<a href="javascript:;" class="weui-tabbar__item">--}}
            {{--<div class="weui-tabbar__icon">--}}
                {{--<img src="/images/yonghu.png" alt="">--}}
            {{--</div>--}}
            {{--<p class="weui-tabbar__label">个人中心</p>--}}
        {{--</a>--}}
    </div>
</div>