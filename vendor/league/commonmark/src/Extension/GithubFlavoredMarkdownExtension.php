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

namespace League\CommonMark\Extension;

<<<<<<< HEAD
use League\CommonMark\ConfigurableEnvironmentInterface;
=======
use League\CommonMark\Environment\EnvironmentBuilderInterface;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
use League\CommonMark\Extension\Autolink\AutolinkExtension;
use League\CommonMark\Extension\DisallowedRawHtml\DisallowedRawHtmlExtension;
use League\CommonMark\Extension\Strikethrough\StrikethroughExtension;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\Extension\TaskList\TaskListExtension;

final class GithubFlavoredMarkdownExtension implements ExtensionInterface
{
<<<<<<< HEAD
    public function register(ConfigurableEnvironmentInterface $environment)
=======
    public function register(EnvironmentBuilderInterface $environment): void
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        $environment->addExtension(new AutolinkExtension());
        $environment->addExtension(new DisallowedRawHtmlExtension());
        $environment->addExtension(new StrikethroughExtension());
        $environment->addExtension(new TableExtension());
        $environment->addExtension(new TaskListExtension());
    }
}
