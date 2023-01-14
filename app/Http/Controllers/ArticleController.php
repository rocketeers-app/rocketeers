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

        $relatedArticlesList = Article::published()
            ->where('category', $article->category)
            ->where('slug', '!=', $article->slug)
            ->orderBy('published_at')
            ->get();

        $relatedArticles = collect();

        if($relatedArticlesList->count() > 2) {
            $relatedArticles = $relatedArticlesList->filter(function($relatedArticle) use ($article) {
                return $relatedArticle->published_at <= $article->published_at;
            })
            ->take(2);
        }

        if($relatedArticles->count() < 2) {
            $relatedArticles = $relatedArticles->merge($relatedArticlesList->take(2 - $relatedArticles->count());
        }

        return view('articles.show', compact('article', 'relatedArticles'));
    }
}
