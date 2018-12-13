<?php

namespace App\Http\Controllers;

use App\WechatUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class WeChatController extends Controller
{
    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $app = app('wechat.official_account');
        $app->server->push(function($message){
            return "欢迎关注 Security Paper！";
        });

        return $app->server->serve();
    }

    public function menu_refresh()
    {
        $buttons = [
            [
                "type" => "view",
                "name" => "泰式感知",
                "url"  => url('/monitor')
            ],
            [
                "type" => "view",
                "name" => "访问官网",
                "url"  => "https://www.securitypaper.org"
            ]
//            [
//                "name"       => "测试按钮",
//                "sub_button" => [
//                    [
//                        "type" => "view",
//                        "name" => "更新菜单",
//                        "url"  => url('wechat/menu')
//                    ],
//                ],
//            ]
        ];
        $app = app('wechat.official_account');
        $app->menu->create($buttons);
        return 'Menu Updated';
    }


}
