<?php

namespace App\Models;

use Orbit\Contracts\Orbit;
use Orbit\Concerns\Orbital;
use Orbit\Drivers\Markdown;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Schema\Blueprint;
use Spatie\Sitemap\Contracts\Sitemapable;

class Feature extends Model implements Sitemapable, Orbit
{
    use Orbital;

    public $incrementing = false;

    protected $guarded = [];

    protected static function booted(): void
    {
        static::saved(function () {
            defer(function () {
                sleep(1);
                Artisan::call('orbit:clear', ['--force' => true]);
            });
        });
    }

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
