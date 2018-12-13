<?php

namespace App\Http\Middleware;

use App\WechatUser;
use Closure;
use Illuminate\Support\Facades\Session;

class AuthLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = session('wechat.oauth_user.default'); // 拿到授权用户资料
        $model = WechatUser::login($user);
        Session::put('user',$model);
        return $next($request);
    }
}
