<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Overtrue\Socialite\AuthorizeFailedException;

/**
 * App\WechatUser
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WechatUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WechatUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WechatUser query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $openid
 * @property string $nickname
 * @property string $headimgurl
 * @property int $sex
 * @property string $city
 * @property string $province
 * @property string $country
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WechatUser whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WechatUser whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WechatUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WechatUser whereHeadimgurl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WechatUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WechatUser whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WechatUser whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WechatUser whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WechatUser whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WechatUser whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RssPush[] $myRss
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Subscription[] $subscriptions
 */
class WechatUser extends Model
{
    protected $fillable = [
        'openid', 'nickname', 'headimgurl',
        'sex', 'city', 'province', 'country'
    ];

    protected $casts = [
        'sex'   => 'boolean'
    ];

    public static function login($user)
    {
        try{
            $info = $user['original'];
        }catch (\Exception $exception){
            throw new AuthorizeFailedException('用户认证失败',[]);
        }

        if(is_array($info) && key_exists('openid',$info)){
            $model = self::updateOrCreate([
                'openid' => $info['openid']
            ],$info);
            return $model;
        }else{
            throw new AuthorizeFailedException('用户认证失败',[]);
        }
    }

    public static function user()
    {
        if(($user = Session::get('user'))){
            return self::find($user->id);
        }
    }

    public function myRss()
    {
        return $this->hasMany(RssPush::class,'user_id','id');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class,'user_id','id');
    }
}
