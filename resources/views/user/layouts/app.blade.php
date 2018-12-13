<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Security Paper') - Security Paper</title>
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/weui.min.css">
    @yield('header_css')
    <style>
        .footer-menu{position: fixed!important;z-index: 9;bottom: 0;width: 100%;height: 58px;max-width: 640px;}
    </style>
</head>
<body>
<div id="app" class="page-{{ route_class() }}">
    @include('user.layouts._header')
    @yield('banner')
    <div class="main">
        @yield('content')
    </div>
    @include('user.layouts._footer')
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>

@yield('footer_js')
</html>