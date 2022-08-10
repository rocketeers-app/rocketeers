<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Post extends Model implements Sitemapable
{
    use Orbital;

    public $incrementing = false;

    protected $casts = [
        'date' => 'date:Y-m-d',
    ];

    public function getKeyName()
    {
        return 'slug';
    }

    public static function schema(Blueprint $table)
    {
        $table->string('title');
        $table->string('slug');
        $table->text('date');
        $table->text('content')->nullable();
    }

    public function getUrlAttribute()
    {
        return route('post.show', $this->attributes['slug']);
    }

    public function toSitemapTag(): Url | string | array
    {
        return $this->url;
    }
}
