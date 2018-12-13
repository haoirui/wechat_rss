<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Subscription
 *
 * @property int $id
 * @property string $keyword
 * @property int $user_id
 * @property int $openid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\WechatUser $user
 */
class Subscription extends Model
{
    protected $fillable = [
        'keyword', 'user_id', 'openid'
    ];

    public function user()
    {
        return $this->belongsTo(WechatUser::class,'user_id','id');
    }
}
