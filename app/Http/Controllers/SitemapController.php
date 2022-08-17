<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Feature;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function __invoke(Request $request)
    {
        return Sitemap::create()
            ->add(Url::create(route('home')))
            ->add(Url::create(route('article.index')))
            // ->add(Url::create(route('doc.index')))
            ->add(Url::create(route('feature.index')))
            // ->add(Doc::published()->get())
            ->add(Article::published()->get())
            ->add(Feature::published()->get());
    }
}