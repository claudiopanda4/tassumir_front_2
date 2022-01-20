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

namespace League\CommonMark\Extension\InlinesOnly;

<<<<<<< HEAD
use League\CommonMark\Block\Element\Document;
use League\CommonMark\Block\Element\Paragraph;
use League\CommonMark\Block\Parser as BlockParser;
use League\CommonMark\ConfigurableEnvironmentInterface;
use League\CommonMark\Delimiter\Processor\EmphasisDelimiterProcessor;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Inline\Element as InlineElement;
use League\CommonMark\Inline\Parser as InlineParser;
use League\CommonMark\Inline\Renderer as InlineRenderer;

final class InlinesOnlyExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
=======
use League\CommonMark as Core;
use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\CommonMark;
use League\CommonMark\Extension\CommonMark\Delimiter\Processor\EmphasisDelimiterProcessor;
use League\CommonMark\Extension\ConfigurableExtensionInterface;
use League\Config\ConfigurationBuilderInterface;
use Nette\Schema\Expect;

final class InlinesOnlyExtension implements ConfigurableExtensionInterface
{
    public function configureSchema(ConfigurationBuilderInterface $builder): void
    {
        $builder->addSchema('commonmark', Expect::structure([
            'use_asterisk' => Expect::bool(true),
            'use_underscore' => Expect::bool(true),
            'enable_strong' => Expect::bool(true),
            'enable_em' => Expect::bool(true),
        ]));
    }

    // phpcs:disable Generic.Functions.FunctionCallArgumentSpacing.TooMuchSpaceAfterComma,Squiz.WhiteSpace.SemicolonSpacing.Incorrect
    public function register(EnvironmentBuilderInterface $environment): void
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        $childRenderer = new ChildRenderer();

        $environment
<<<<<<< HEAD
            ->addBlockParser(new BlockParser\LazyParagraphParser(), -200)

            ->addInlineParser(new InlineParser\NewlineParser(),     200)
            ->addInlineParser(new InlineParser\BacktickParser(),    150)
            ->addInlineParser(new InlineParser\EscapableParser(),    80)
            ->addInlineParser(new InlineParser\EntityParser(),       70)
            ->addInlineParser(new InlineParser\AutolinkParser(),     50)
            ->addInlineParser(new InlineParser\HtmlInlineParser(),   40)
            ->addInlineParser(new InlineParser\CloseBracketParser(), 30)
            ->addInlineParser(new InlineParser\OpenBracketParser(),  20)
            ->addInlineParser(new InlineParser\BangParser(),         10)

            ->addBlockRenderer(Document::class, $childRenderer, 0)
            ->addBlockRenderer(Paragraph::class, $childRenderer, 0)

            ->addInlineRenderer(InlineElement\Code::class,       new InlineRenderer\CodeRenderer(),       0)
            ->addInlineRenderer(InlineElement\Emphasis::class,   new InlineRenderer\EmphasisRenderer(),   0)
            ->addInlineRenderer(InlineElement\HtmlInline::class, new InlineRenderer\HtmlInlineRenderer(), 0)
            ->addInlineRenderer(InlineElement\Image::class,      new InlineRenderer\ImageRenderer(),      0)
            ->addInlineRenderer(InlineElement\Link::class,       new InlineRenderer\LinkRenderer(),       0)
            ->addInlineRenderer(InlineElement\Newline::class,    new InlineRenderer\NewlineRenderer(),    0)
            ->addInlineRenderer(InlineElement\Strong::class,     new InlineRenderer\StrongRenderer(),     0)
            ->addInlineRenderer(InlineElement\Text::class,       new InlineRenderer\TextRenderer(),       0)
        ;

        if ($environment->getConfig('use_asterisk', true)) {
            $environment->addDelimiterProcessor(new EmphasisDelimiterProcessor('*'));
        }
        if ($environment->getConfig('use_underscore', true)) {
=======
            ->addInlineParser(new Core\Parser\Inline\NewlineParser(),           200)
            ->addInlineParser(new CommonMark\Parser\Inline\BacktickParser(),    150)
            ->addInlineParser(new CommonMark\Parser\Inline\EscapableParser(),    80)
            ->addInlineParser(new CommonMark\Parser\Inline\EntityParser(),       70)
            ->addInlineParser(new CommonMark\Parser\Inline\AutolinkParser(),     50)
            ->addInlineParser(new CommonMark\Parser\Inline\HtmlInlineParser(),   40)
            ->addInlineParser(new CommonMark\Parser\Inline\CloseBracketParser(), 30)
            ->addInlineParser(new CommonMark\Parser\Inline\OpenBracketParser(),  20)
            ->addInlineParser(new CommonMark\Parser\Inline\BangParser(),         10)

            ->addRenderer(Core\Node\Block\Document::class,  $childRenderer, 0)
            ->addRenderer(Core\Node\Block\Paragraph::class, $childRenderer, 0)

            ->addRenderer(CommonMark\Node\Inline\Code::class,       new CommonMark\Renderer\Inline\CodeRenderer(),       0)
            ->addRenderer(CommonMark\Node\Inline\Emphasis::class,   new CommonMark\Renderer\Inline\EmphasisRenderer(),   0)
            ->addRenderer(CommonMark\Node\Inline\HtmlInline::class, new CommonMark\Renderer\Inline\HtmlInlineRenderer(), 0)
            ->addRenderer(CommonMark\Node\Inline\Image::class,      new CommonMark\Renderer\Inline\ImageRenderer(),      0)
            ->addRenderer(CommonMark\Node\Inline\Link::class,       new CommonMark\Renderer\Inline\LinkRenderer(),       0)
            ->addRenderer(Core\Node\Inline\Newline::class,          new Core\Renderer\Inline\NewlineRenderer(),          0)
            ->addRenderer(CommonMark\Node\Inline\Strong::class,     new CommonMark\Renderer\Inline\StrongRenderer(),     0)
            ->addRenderer(Core\Node\Inline\Text::class,             new Core\Renderer\Inline\TextRenderer(),             0)
        ;

        if ($environment->getConfiguration()->get('commonmark/use_asterisk')) {
            $environment->addDelimiterProcessor(new EmphasisDelimiterProcessor('*'));
        }

        if ($environment->getConfiguration()->get('commonmark/use_underscore')) {
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            $environment->addDelimiterProcessor(new EmphasisDelimiterProcessor('_'));
        }
    }
}
