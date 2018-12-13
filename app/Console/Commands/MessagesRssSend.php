<?php

namespace App\Console\Commands;

use App\Rss;
use App\RssPush;
use App\Subscription;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class MessagesRssSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'messages:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '发送订阅消息';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $app = app('wechat.official_account');
        $message_list = $this->match_keywords();
        foreach ($message_list as $list){
            $app->template_message->send([
                'touser' => $list['openid'],
                'template_id' => env('TEMPLATE_ID','WngYHdfVOxM_MvLc0Bq5nsNHfKOVIdo4hE_AIVC22lk'),
                'url' => $list['url'],
                'data' => [
                    'title' => $list['title'],
                    'url' => $list['url'],
                    'pub_date'  => $list['pub_date']
                ],
            ]);
        }

    }

    protected function match_keywords(){
        //like关键词并且不在发送名单里/只发送近七天采集的
        $keywords = Subscription::selectRaw('distinct(keyword) as keyword')->pluck('keyword');
        $list_array = [];
        $pushed_id = RssPush::pluck('rss_id');
        foreach ($keywords as $keyword){
            $lists = Rss::whereBetween('created_at',[date('Y-m-d H:i:s',time()-60*60*24*7),date('Y-m-d H:i:s')])
                ->whereNotIn('id',$pushed_id)
                ->where('title','like',"%$keyword%")
                ->get();
            if(count($lists)){
                $subscription_list = Subscription::where('keyword',$keyword)->get();
                foreach($subscription_list as $sub){
                    foreach ($lists as $list){
                        $openid = $sub->user->openid;
                        array_push($list_array,[
                            'openid'    => $openid,
                            'title'     => $list->title,
                            'url'       => $list->url,
                            'pub_date'  => $list->pub_date
                        ]);
                        $model = RssPush::create([
                            'user_id'   => $sub->user_id,
                            'openid'    => $openid,
                            'rss_id'    => $list->id
                        ]);
                        print "Send To:$openid\r\nPushID:".$model->id."\r\n";
                        Log::info("Send To:$openid\r\nPushID:".$model->id);
                    }

                }
            }
        }
        return $list_array;
    }
}
