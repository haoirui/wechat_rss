<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Rss
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string|null $summary
 * @property string $url
 * @property string|null $pub_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss wherePubDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rss whereUrl($value)
 */
class Rss extends Model
{
    protected $table    = 'rss';
    protected $fillable = [
        'title', 'summary',
        'url', 'pub_date'
    ];

    public function getRssList($searchParam)
    {
        return self::where(function ($query) use($searchParam){

        });
    }
}
