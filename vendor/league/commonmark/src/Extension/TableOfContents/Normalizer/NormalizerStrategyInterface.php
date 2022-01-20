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

namespace League\CommonMark\Extension\TableOfContents\Normalizer;

<<<<<<< HEAD
use League\CommonMark\Block\Element\ListItem;
=======
use League\CommonMark\Extension\CommonMark\Node\Block\ListItem;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

interface NormalizerStrategyInterface
{
    public function addItem(int $level, ListItem $listItemToAdd): void;
}
