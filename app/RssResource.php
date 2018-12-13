<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\RssResource
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $openid
 * @property string $url
 * @property bool $status
 * @property string|null $mark
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RssResource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RssResource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RssResource query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RssResource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RssResource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RssResource whereMark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RssResource whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RssResource whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RssResource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RssResource whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RssResource whereUserId($value)
 * @mixin \Eloquent
 */
class RssResource extends Model
{
    protected $fillable = [
        'user_id','openid', 'url',
        'status', 'mark'
    ];

    protected $casts = [
        'status'    => 'boolean'
    ];

    public static function enable_list()
    {
        return self::where('status',true);
    }
}
