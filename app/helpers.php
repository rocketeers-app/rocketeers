<?php

use Spatie\LaravelMarkdown\MarkdownRenderer;
use Backstage\Static\Laravel\Console\Terminal;

if (! function_exists('markdown')) {
    function markdown($markdown)
    {
        return app(MarkdownRenderer::class)
            ->toHtml($markdown);
    }
}

if (! function_exists('console')) {
    function console()
    {
        return new Terminal;
    }
}
