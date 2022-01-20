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
use League\CommonMark\Extension\TableOfContents\Node\TableOfContents;

final class FlatNormalizerStrategy implements NormalizerStrategyInterface
{
<<<<<<< HEAD
    /** @var TableOfContents */
    private $toc;
=======
    /** @psalm-readonly */
    private TableOfContents $toc;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

    public function __construct(TableOfContents $toc)
    {
        $this->toc = $toc;
    }

    public function addItem(int $level, ListItem $listItemToAdd): void
    {
        $this->toc->appendChild($listItemToAdd);
    }
}
<<<<<<< HEAD

// Trigger autoload without causing a deprecated error
\class_exists(TableOfContents::class);
=======
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
