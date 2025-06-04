<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function __invoke(Request $request)
    {
        $sitemap = Sitemap::create()
            ->add(Url::create(route('home')))
            ->add(Url::create('knowledge'))
            ->add(Url::create(route('feature.index')));

        Article::pluck('category')
            ->unique()
            ->filter()
            ->each(fn ($category) => $sitemap->add(Url::create(str_slug($category))));

        $sitemap
            ->add(Article::published()->get())
            ->add(Feature::published()->get());

        return $sitemap;
    }
}
