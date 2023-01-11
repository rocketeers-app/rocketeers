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
            ->filter()
            ->mapWithKeys(function ($category) {
                return [str_slug($category) => $category];
            });

        $articles = Article::published()
            ->when(null !== $category = $categories[$slug] ?? null, function ($query) use ($category) {
                $query->where('category', $category);
            })
            ->orderByDesc('published_at')
            ->take(5)
            ->get();

        if (! is_null($category) || $slug == 'knowledge') {
            return view('articles.index', compact('category', 'categories', 'articles'));
        }

        $article = Article::published()
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedArticles = Article::published()
            ->where('category', $article->category)
            ->where('slug', '!=', $article->slug)
            ->get()
            ->filter(function($relatedArticle) use ($article) {
                return $relatedArticle->published_at <= $article->published_at;
            })
            ->take(2);

        return view('articles.show', compact('article', 'relatedArticles'));
    }
}
