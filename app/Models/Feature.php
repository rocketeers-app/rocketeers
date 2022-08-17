<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Feature extends Model implements Sitemapable
{
    use Orbital;

    public $incrementing = false;

    public function getKeyName()
    {
        return 'slug';
    }

    public static function schema(Blueprint $table)
    {
        $table->string('title');
        $table->string('slug');
        $table->text('description')->nullable();
        $table->text('content')->nullable();
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    public function getUrlAttribute()
    {
        return route('feature.show', $this->attributes['slug']);
    }

    public function toSitemapTag(): Url | string | array
    {
        return $this->url;
    }
}
