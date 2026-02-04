<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function __invoke($slug)
    {
        $categories = Article::pluck("category")
            ->unique()
            ->sort()
            ->filter()
            ->mapWithKeys(function ($category) {
                return [str_slug($category) => $category];
            });

        $articles = Article::query()
            ->when(
                null !== ($category = $categories[$slug] ?? null),
                fn($query) => $query->where("category", $category),
            )
            ->get()
            ->sortByDesc("published_at");

        if (is_null($category)) {
            $articles = $articles->take(5);
        }

        if (!is_null($category) || $slug == "knowledge") {
            return view(
                "articles.index",
                compact("category", "categories", "articles"),
            );
        }

        $article = Article::published()->where("slug", $slug)->firstOrFail();

        $relatedArticlesList = Article::published()
            ->where("category", $article->category)
            ->where("slug", "!=", $article->slug)
            ->orderBy("published_at")
            ->get();

        $relatedArticles = collect();

        if ($relatedArticlesList->count() > 2) {
            $relatedArticles = $relatedArticlesList
                ->filter(function ($relatedArticle) use ($article) {
                    return $relatedArticle->published_at <=
                        $article->published_at;
                })
                ->take(2);
        }

        if ($relatedArticles->count() < 2) {
            $relatedArticles = $relatedArticles->merge(
                $relatedArticlesList->take(2 - $relatedArticles->count()),
            );
        }

        return view("articles.show", compact("article", "relatedArticles"));
    }
}
