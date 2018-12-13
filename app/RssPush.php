<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\RssPush
 *
 * @property int $id
 * @property int $user_id
 * @property int $openid
 * @property int $rss_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Rss $rss
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RssPush newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RssPush newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RssPush query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RssPush whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RssPush whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RssPush whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RssPush whereRssId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RssPush whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RssPush whereUserId($value)
 * @mixin \Eloquent
 */
class RssPush extends Model
{
    protected $fillable = [
        'user_id','openid', 'rss_id'
    ];

    public function rss()
    {
        return $this->belongsTo(Rss::class,'rss_id','id');
    }
}
