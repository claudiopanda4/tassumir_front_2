<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Extension\DisallowedRawHtml;

<<<<<<< HEAD
use League\CommonMark\Block\Element\HtmlBlock;
use League\CommonMark\Block\Renderer\HtmlBlockRenderer;
use League\CommonMark\ConfigurableEnvironmentInterface;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Inline\Element\HtmlInline;
use League\CommonMark\Inline\Renderer\HtmlInlineRenderer;

final class DisallowedRawHtmlExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addBlockRenderer(HtmlBlock::class, new DisallowedRawHtmlBlockRenderer(new HtmlBlockRenderer()), 50);
        $environment->addInlineRenderer(HtmlInline::class, new DisallowedRawHtmlInlineRenderer(new HtmlInlineRenderer()), 50);
=======
use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\CommonMark\Node\Block\HtmlBlock;
use League\CommonMark\Extension\CommonMark\Node\Inline\HtmlInline;
use League\CommonMark\Extension\CommonMark\Renderer\Block\HtmlBlockRenderer;
use League\CommonMark\Extension\CommonMark\Renderer\Inline\HtmlInlineRenderer;
use League\CommonMark\Extension\ConfigurableExtensionInterface;
use League\Config\ConfigurationBuilderInterface;
use Nette\Schema\Expect;

final class DisallowedRawHtmlExtension implements ConfigurableExtensionInterface
{
    private const DEFAULT_DISALLOWED_TAGS = [
        'title',
        'textarea',
        'style',
        'xmp',
        'iframe',
        'noembed',
        'noframes',
        'script',
        'plaintext',
    ];

    public function configureSchema(ConfigurationBuilderInterface $builder): void
    {
        $builder->addSchema('disallowed_raw_html', Expect::structure([
            'disallowed_tags' => Expect::listOf('string')->default(self::DEFAULT_DISALLOWED_TAGS)->mergeDefaults(false),
        ]));
    }

    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addRenderer(HtmlBlock::class, new DisallowedRawHtmlRenderer(new HtmlBlockRenderer()), 50);
        $environment->addRenderer(HtmlInline::class, new DisallowedRawHtmlRenderer(new HtmlInlineRenderer()), 50);
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
