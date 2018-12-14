<nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/monitor') }}">
                Security Paper
            </a>
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(!is_null(Session::get('user')->headimgurl ?? null))
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                                <img src="{{ Session::get('user')->headimgurl }}" class="img-responsive img-circle" width="30px" height="30px">
                            </span>
                        {{ Session::get('user')->nickname }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('/user/keywords') }}">订阅设置</a>
                            {{--<a href="{{ url('/user/info_submit') }}">贡献来源</a>--}}
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>