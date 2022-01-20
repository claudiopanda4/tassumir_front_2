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

namespace League\CommonMark\Extension\Autolink;

<<<<<<< HEAD
use League\CommonMark\ConfigurableEnvironmentInterface;
use League\CommonMark\Event\DocumentParsedEvent;
=======
use League\CommonMark\Environment\EnvironmentBuilderInterface;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
use League\CommonMark\Extension\ExtensionInterface;

final class AutolinkExtension implements ExtensionInterface
{
<<<<<<< HEAD
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addEventListener(DocumentParsedEvent::class, new EmailAutolinkProcessor());
        $environment->addEventListener(DocumentParsedEvent::class, new UrlAutolinkProcessor());
=======
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addInlineParser(new EmailAutolinkParser());
        $environment->addInlineParser(new UrlAutolinkParser());
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
