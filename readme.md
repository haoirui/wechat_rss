# 微信RSS订阅

✅ 自定义关键词订阅

✅ 微信自动登录

✅ 自动采集

✅ 自动推送，如果有历史消息则推送7天内的情报
## 安装方法：

#### 创建消息模板
在微信后台创建微信消息模板，将env中的TEMPLATE_ID设置为模板ID
```
标题：{{title.DATA}} 
链接：{{url.DATA}} 
发布日期：{{pub_date.DATA}} 

Security Paper Team
```

#### 配置公众号
`config/wechat.php`修改此文件，配置成自己的公众号

测试公众号：

<img src="https://github.com/Nash-x9/wechat_rss/raw/master/0.jpeg" width="375" alt="测试公众号"/>

#### 执行安装
```bash
comopser install
php artisan key:generate
php artisan migrate
php artisan db:seed --class=RssListSeeder #导入默认采集源
crontab -e
#创建定时任务 * * * * * php /path/to/artisan schedule:run
```

#### 默认参数
 - 采集周期：十分钟
 - 推送周期：五分钟
 
 如需修改`app/Console/Kernel.php`该文件中配置此参数
 
## TODO：
    1.个人中心页面
    2.贡献采集源
    3.后台统计

