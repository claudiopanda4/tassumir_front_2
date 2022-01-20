<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com> and uAfrica.com (http://uafrica.com)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Extension\Strikethrough;

<<<<<<< HEAD
use League\CommonMark\ConfigurableEnvironmentInterface;
=======
use League\CommonMark\Environment\EnvironmentBuilderInterface;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
use League\CommonMark\Extension\ExtensionInterface;

final class StrikethroughExtension implements ExtensionInterface
{
<<<<<<< HEAD
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addDelimiterProcessor(new StrikethroughDelimiterProcessor());
        $environment->addInlineRenderer(Strikethrough::class, new StrikethroughRenderer());
=======
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addDelimiterProcessor(new StrikethroughDelimiterProcessor());
        $environment->addRenderer(Strikethrough::class, new StrikethroughRenderer());
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
