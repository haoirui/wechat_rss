<?php

namespace App\Http\Controllers;

use App\Rss;
use App\RssPush;
use App\Subscription;
use App\WechatUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MonitorController extends Controller
{
    public function index(Request $request)
    {
        //获取我订阅的关键词
        $myRss = WechatUser::user()->myRss()->orderByDesc('pub_dates')
                    ->paginate(10);

        return view('user.index',array_merge([
            'my_rss'    => $myRss
        ]),$request->input());
    }

    public function keywords(Request $request)
    {

        $user = WechatUser::user();

        if($request->isMethod('POST')){
            //添加关键词。

            //判断关键词订阅数是否超过50个，如果超过50个提示订阅关键词太多
            if(count($user->subscriptions)> 50){
                return response()->json([
                    'code'  => 403,
                    'msg'=> '',
                    'error' =>'订阅数不能超过50个，请删除几个再添加！～'
                ]);
            }else{
                Subscription::create([
                    'keyword'   => $request->input('keyword'),
                    'user_id'   => $user->id,
                    'openid'    => $user->openid,
                ]);
                return response()->json([
                    'code'  => 0,
                    'msg'   => '订阅成功!~'
                ]);
            }
        }

        //获取我订阅的关键词
        $keywords = $user->subscriptions;
        return view('user.keywords',[
            'keywords'  => $keywords
        ]);
    }

    public function articles(Request $request)
    {
        //获取所有的安全舆情
        $myRss = (new Rss())->getRssList($request->input())->orderByDesc('pub_date')
            ->paginate(10);

        return view('user.articles',array_merge([
            'my_rss'    => $myRss
        ]),$request->input());
    }

    public function keyword_del(Subscription $subscription)
    {
        if($subscription->delete()){
            Session::flash('success','删除成功');
            return redirect('/user/keywords');
        }else{
            Session::flash('error','删除失败!');
            return redirect('/user/keywords');
        }
    }
}
