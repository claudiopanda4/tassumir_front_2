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

namespace League\CommonMark\Extension\TaskList;

<<<<<<< HEAD
use League\CommonMark\ConfigurableEnvironmentInterface;
=======
use League\CommonMark\Environment\EnvironmentBuilderInterface;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
use League\CommonMark\Extension\ExtensionInterface;

final class TaskListExtension implements ExtensionInterface
{
<<<<<<< HEAD
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addInlineParser(new TaskListItemMarkerParser(), 35);
        $environment->addInlineRenderer(TaskListItemMarker::class, new TaskListItemMarkerRenderer());
=======
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addInlineParser(new TaskListItemMarkerParser(), 35);
        $environment->addRenderer(TaskListItemMarker::class, new TaskListItemMarkerRenderer());
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
