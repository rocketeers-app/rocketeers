<?php

if (! function_exists('markdown')) {
    function markdown($markdown)
    {
        return app(Spatie\LaravelMarkdown\MarkdownRenderer::class)
            ->toHtml($markdown);
    }
}
