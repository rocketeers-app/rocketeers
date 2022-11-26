<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function __invoke($slug)
    {
        $categories = Article::pluck('category')
            ->unique()
            ->sort()
            ->mapWithKeys(function($category) {
                return [str_slug($category) => $category];
            });

        $articles = Article::whereNotNull('published_at')
            ->when(null !== $category = $categories[$slug] ?? null, function ($query) use ($category) {
                $query->where('category', $category);
            })
            ->orderByDesc('published_at')
            ->take(5)
            ->get();

        if(!is_null($category) || $slug == 'knowledge') {
            return view('articles.index', compact('category', 'categories', 'articles'));
        }

        $article = Article::whereNotNull('published_at')
            ->where('slug', $slug)
            ->first();

        return view('articles.show', compact('article'));
    }
}
