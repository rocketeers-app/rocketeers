<?php

use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;
use League\CommonMark\Extension\ExternalLink\ExternalLinkExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\TableOfContents\TableOfContentsExtension;
use Tempest\Highlight\CommonMark\CodeBlockRenderer;
use Tempest\Highlight\CommonMark\InlineCodeBlockRenderer;

return [
    'code_highlighting' => [
        /*
         * To highlight code, we'll use Shiki under the hood. Make sure it's installed.
         *
         * More info: https://spatie.be/docs/laravel-markdown/v1/installation-setup
         */
        'enabled' => false,

        /*
         * The name of or path to a Shiki theme
         *
         * More info: https://github.com/shikijs/shiki/blob/master/docs/themes.md
         */
        'theme' => 'github-dark',
    ],

    /*
     * When enabled, anchor links will be added to all titles
     */
    'add_anchors_to_headings' => false,

    /*
     * These options will be passed to the league/commonmark package which is
     * used under the hood to render markdown.
     *
     * More info: https://spatie.be/docs/laravel-markdown/v1/using-the-blade-component/passing-options-to-commonmark
     */
    'commonmark_options' => [
        'table_of_contents' => [
            'html_class' => 'table-of-contents',
            'position' => 'top',
            'style' => 'ordered',
            'min_heading_level' => 1,
            'max_heading_level' => 6,
            'normalize' => 'flat',
            'placeholder' => null,
        ],
        'heading_permalink' => [
            'html_class' => 'heading-permalink',
            'insert' => 'before',
            'title' => 'Permalink',
            'symbol' => '#',
        ],
        'external_link' => [
            'internal_hosts' => 'rocketee.rs',
            'open_in_new_window' => true,
            'html_class' => 'external-link',
            'nofollow' => '',
            'noopener' => 'external',
            'noreferrer' => 'external',
        ],
    ],

    /*
     * Rendering markdown to HTML can be resource intensive. By default
     * we'll cache the results.
     *
     * You can specify the name of a cache store here. When set to `null`
     * the default cache store will be used. If you do not want to use
     * caching set this value to `false`.
     */
    'cache_store' => null,

    /*
     * This class will convert markdown to HTML
     *
     * You can change this to a class of your own to greatly
     * customize the rendering process
     *
     * More info: https://spatie.be/docs/laravel-markdown/v1/advanced-usage/customizing-the-rendering-process
     */
    'renderer_class' => Spatie\LaravelMarkdown\MarkdownRenderer::class,

    /*
     * These extensions should be added to the markdown environment. A valid
     * extension implements League\CommonMark\Extension\ExtensionInterface
     *
     * More info: https://commonmark.thephpleague.com/2.1/extensions/overview/
     */
    'extensions' => [
        HeadingPermalinkExtension::class,
        TableOfContentsExtension::class,
        ExternalLinkExtension::class,
    ],

    /*
     * These block renderers should be added to the markdown environment. A valid
     * renderer implements League\CommonMark\Renderer\NodeRendererInterface;
     *
     * More info: https://commonmark.thephpleague.com/2.1/customization/rendering/
     */
    'block_renderers' => [
        // ['class' => FencedCode::class, 'renderer' => new MyCustomCodeRenderer(), 'priority' => 0]
    ],

    /*
     * These inline renderers should be added to the markdown environment. A valid
     * renderer implements League\CommonMark\Renderer\NodeRendererInterface;
     *
     * More info: https://commonmark.thephpleague.com/2.1/customization/rendering/
     */
    'inline_renderers' => [
        // ['class' => FencedCode::class, 'renderer' => new MyCustomCodeRenderer(), 'priority' => 0]
    ],

    /*
     * These inline parsers should be added to the markdown environment. A valid
     * parser implements League\CommonMark\Renderer\InlineParserInterface;
     *
     * More info: https://commonmark.thephpleague.com/2.3/customization/inline-parsing/
     */
    'inline_parsers' => [
        // ['parser' => new MyCustomInlineParser(), 'priority' => 0]
    ],
];
