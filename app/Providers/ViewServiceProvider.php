<?php

namespace App\Providers;

use App\Models\Article;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $categories = Article::pluck('category')
            ->unique()
            ->sort()
            ->filter()
            ->mapWithKeys(function($category) {
                return [str_slug($category) => $category];
            });

        view()->share(
            compact(
                'categories'
            )
        );
    }
}
