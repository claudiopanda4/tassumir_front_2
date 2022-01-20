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
 * Original code based on the CommonMark JS reference parser (https://bitly.com/commonmark-js)
 *  - (c) John MacFarlane
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Extension;

<<<<<<< HEAD
use League\CommonMark\ConfigurableEnvironmentInterface;

interface ExtensionInterface
{
    /**
     * @param ConfigurableEnvironmentInterface $environment
     *
     * @return void
     */
    public function register(ConfigurableEnvironmentInterface $environment);
=======
use League\CommonMark\Environment\EnvironmentBuilderInterface;

interface ExtensionInterface
{
    public function register(EnvironmentBuilderInterface $environment): void;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
}
