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

namespace League\CommonMark\Extension\ExternalLink;

<<<<<<< HEAD
use League\CommonMark\ConfigurableEnvironmentInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\ExtensionInterface;

final class ExternalLinkExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addEventListener(DocumentParsedEvent::class, new ExternalLinkProcessor($environment), -50);
=======
use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\ConfigurableExtensionInterface;
use League\Config\ConfigurationBuilderInterface;
use Nette\Schema\Expect;

final class ExternalLinkExtension implements ConfigurableExtensionInterface
{
    public function configureSchema(ConfigurationBuilderInterface $builder): void
    {
        $applyOptions = [
            ExternalLinkProcessor::APPLY_NONE,
            ExternalLinkProcessor::APPLY_ALL,
            ExternalLinkProcessor::APPLY_INTERNAL,
            ExternalLinkProcessor::APPLY_EXTERNAL,
        ];

        $builder->addSchema('external_link', Expect::structure([
            'internal_hosts' => Expect::type('string|string[]'),
            'open_in_new_window' => Expect::bool(false),
            'html_class' => Expect::string()->default(''),
            'nofollow' => Expect::anyOf(...$applyOptions)->default(ExternalLinkProcessor::APPLY_NONE),
            'noopener' => Expect::anyOf(...$applyOptions)->default(ExternalLinkProcessor::APPLY_EXTERNAL),
            'noreferrer' => Expect::anyOf(...$applyOptions)->default(ExternalLinkProcessor::APPLY_EXTERNAL),
        ]));
    }

    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addEventListener(DocumentParsedEvent::class, new ExternalLinkProcessor($environment->getConfiguration()), -50);
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
