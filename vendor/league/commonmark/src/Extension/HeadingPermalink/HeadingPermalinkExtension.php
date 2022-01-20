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

namespace League\CommonMark\Extension\HeadingPermalink;

<<<<<<< HEAD
use League\CommonMark\ConfigurableEnvironmentInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\ExtensionInterface;
=======
use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\ConfigurableExtensionInterface;
use League\Config\ConfigurationBuilderInterface;
use Nette\Schema\Expect;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

/**
 * Extension which automatically anchor links to heading elements
 */
<<<<<<< HEAD
final class HeadingPermalinkExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addEventListener(DocumentParsedEvent::class, new HeadingPermalinkProcessor(), -100);
        $environment->addInlineRenderer(HeadingPermalink::class, new HeadingPermalinkRenderer());
=======
final class HeadingPermalinkExtension implements ConfigurableExtensionInterface
{
    public function configureSchema(ConfigurationBuilderInterface $builder): void
    {
        $builder->addSchema('heading_permalink', Expect::structure([
            'min_heading_level' => Expect::int()->min(1)->max(6)->default(1),
            'max_heading_level' => Expect::int()->min(1)->max(6)->default(6),
            'insert' => Expect::anyOf(HeadingPermalinkProcessor::INSERT_BEFORE, HeadingPermalinkProcessor::INSERT_AFTER)->default(HeadingPermalinkProcessor::INSERT_BEFORE),
            'id_prefix' => Expect::string()->default('content'),
            'fragment_prefix' => Expect::string()->default('content'),
            'html_class' => Expect::string()->default('heading-permalink'),
            'title' => Expect::string()->default('Permalink'),
            'symbol' => Expect::string()->default(HeadingPermalinkRenderer::DEFAULT_SYMBOL),
            'aria_hidden' => Expect::bool()->default(true),
        ]));
    }

    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addEventListener(DocumentParsedEvent::class, new HeadingPermalinkProcessor(), -100);
        $environment->addRenderer(HeadingPermalink::class, new HeadingPermalinkRenderer());
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
