<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Feature;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;

class SitemapController extends Controller
{
    public function __invoke(Request $request)
    {
        return Sitemap::create()
            ->add(Article::all())
            ->add(Feature::all());
    }
}
