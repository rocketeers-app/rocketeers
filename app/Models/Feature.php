<?php

namespace App\Models;

use Orbit\Drivers\Markdown;
use Orbit\Contracts\Orbit;
use Orbit\Concerns\Orbital;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Spatie\Sitemap\Contracts\Sitemapable;

class Feature extends Model implements Sitemapable, Orbit
{
    use Orbital;

    public $incrementing = false;

    public function getKeyName()
    {
        return 'slug';
    }

    public function getOrbitDriver(): string
    {
        return Markdown::class;
    }

    public function schema(Blueprint $table): void
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

    public function toSitemapTag(): Url|string|array
    {
        return $this->url;
    }
}
