<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;
use Orbit\Concerns\Orbital;
use Orbit\Contracts\Orbit;
use Orbit\Drivers\Markdown;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Article extends Model implements Feedable, Orbit, Sitemapable
{
    use Orbital;

    public $incrementing = false;

    protected $guarded = [];

    protected $casts = [
        'published_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
    ];

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
        $table->string('category')->nullable();
        $table->text('intro')->nullable();
        $table->text('content')->nullable();
        $table->date('published_at')->nullable();
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->slug)
            ->title($this->title)
            ->summary($this->content)
            ->updated($this->updated_at ?? $this->published_at)
            ->link($this->url)
            ->authorName('Mark van Eijk');
    }

    public function getFeedItems(): Collection
    {
        return Article::published()
            ->orderByDesc('published_at')
            ->get();
    }

    public function getUrlAttribute()
    {
        return route('knowledge', ['slug' => $this->attributes['slug']]);
    }

    public function toSitemapTag(): Url|string|array
    {
        return $this->url;
    }
}
