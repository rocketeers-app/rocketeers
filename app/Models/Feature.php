<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Orbit\Concerns\Orbital;
use Orbit\Contracts\Orbit;
use Orbit\Drivers\Markdown;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Feature extends Model implements Orbit, Sitemapable
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
