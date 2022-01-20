<?php

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 * (c) 2015 Martin Hasoň <martin.hason@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace League\CommonMark\Extension\Attributes;

<<<<<<< HEAD
use League\CommonMark\ConfigurableEnvironmentInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\Attributes\Event\AttributesListener;
use League\CommonMark\Extension\Attributes\Parser\AttributesBlockParser;
=======
use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\Attributes\Event\AttributesListener;
use League\CommonMark\Extension\Attributes\Parser\AttributesBlockStartParser;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
use League\CommonMark\Extension\Attributes\Parser\AttributesInlineParser;
use League\CommonMark\Extension\ExtensionInterface;

final class AttributesExtension implements ExtensionInterface
{
<<<<<<< HEAD
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addBlockParser(new AttributesBlockParser());
=======
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addBlockStartParser(new AttributesBlockStartParser());
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        $environment->addInlineParser(new AttributesInlineParser());
        $environment->addEventListener(DocumentParsedEvent::class, [new AttributesListener(), 'processDocument']);
    }
}
