<?php

use Illuminate\Database\Seeder;

class RssListSeeder extends Seeder
{
    CONST URL_LIST = [
        'https://blog.didierstevens.com/feed/',
        'http://www.nxadmin.com/feed',
        'http://blog.nsfocus.net/category/threatalerts/feed/',
        'https://www.exehack.net/news/rss',
        'http://www.huawei.com/cn/rss-feeds/psirt/rss/',
        'http://bobao.360.cn/rss',
        'http://www.91ri.org/rss',
        'http://www.mottoin.com/rss',
        'https://www.secpulse.com/archives/category/news/feed',
        'http://blog.knownsec.com/rss',
        'http://www.youxia.org/rss',
        'http://www.4hou.com/info/news/rss',
        'http://www.aqniu.com/category/threat-alert/rss',
        'http://www.aqniu.com/category/industry/rss',
        'http://www.aqniu.com/category/hack-geek/rss',
        'http://www.aqniu.com/category/tools-tech/rss',
        'http://www.aqniu.com/category/learn/rss',
        'https://www.exploit-db.com/rss.xml',
        'https://paper.seebug.org/rss',
        'http://sec-redclub.com/index.php/feed',
        'https://www.sec-wiki.com/news/rss',
        'http://www.freebuf.com/feed',
        'https://forum.eviloctal.com/rss.php?auth=0',
        'https://api.anquanke.com/data/v1/rss',
        'http://xlab.tencent.com/cn/secnews/atom.xml',
        'https://www.zdnet.com/topic/security/rss.xml',
        'http://feeds.feedburner.com/TheHackersNews?format=xml',
        'https://www.pentestpartners.com/feed/',
        'https://www.securityfocus.com/rss/vulnerabilities.xml',
        'http://blog.sina.com.cn/rss/streethacker.xml',
        'https://taosecurity.blogspot.com/feeds/posts/default?alt=atom',
        'http://www.compasscyber.com/blog/feed/',
        'https://www.forbes.com/security/feed/',
        'https://www.infosecurity-magazine.com/rss/news/',
        'http://bhconsulting.ie/securitywatch/feed/',
        'https://blog.trendmicro.com/feed/',
        'http://krebsonsecurity.com/feed',
        'https://www.cio.com/category/security/index.rss'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::URL_LIST as $url){
            \App\RssResource::firstOrCreate([
                'url' => $url,
            ],[
                'url' => $url,
                'status'=> true
            ]);
        }

    }
}
