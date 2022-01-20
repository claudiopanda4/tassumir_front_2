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
use League\CommonMark\Block\Element\ListBlock;
use League\CommonMark\Block\Element\ListItem;
=======
use League\CommonMark\Extension\CommonMark\Node\Block\ListBlock;
use League\CommonMark\Extension\CommonMark\Node\Block\ListItem;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
use League\CommonMark\Extension\TableOfContents\Node\TableOfContents;

final class AsIsNormalizerStrategy implements NormalizerStrategyInterface
{
<<<<<<< HEAD
    /** @var ListBlock */
    private $parentListBlock;
    /** @var int */
    private $parentLevel = 1;
    /** @var ListItem|null */
    private $lastListItem;
=======
    /** @psalm-readonly-allow-private-mutation */
    private ListBlock $parentListBlock;

    /** @psalm-readonly-allow-private-mutation */
    private int $parentLevel = 1;

    /** @psalm-readonly-allow-private-mutation */
    private ?ListItem $lastListItem = null;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

    public function __construct(TableOfContents $toc)
    {
        $this->parentListBlock = $toc;
    }

    public function addItem(int $level, ListItem $listItemToAdd): void
    {
        while ($level > $this->parentLevel) {
            // Descend downwards, creating new ListBlocks if needed, until we reach the correct depth
            if ($this->lastListItem === null) {
                $this->lastListItem = new ListItem($this->parentListBlock->getListData());
                $this->parentListBlock->appendChild($this->lastListItem);
            }

            $newListBlock = new ListBlock($this->parentListBlock->getListData());
            $newListBlock->setStartLine($listItemToAdd->getStartLine());
            $newListBlock->setEndLine($listItemToAdd->getEndLine());
            $this->lastListItem->appendChild($newListBlock);
            $this->parentListBlock = $newListBlock;
<<<<<<< HEAD
            $this->lastListItem = null;
=======
            $this->lastListItem    = null;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

            $this->parentLevel++;
        }

        while ($level < $this->parentLevel) {
            // Search upwards for the previous parent list block
<<<<<<< HEAD
            while (true) {
                $this->parentListBlock = $this->parentListBlock->parent();
                if ($this->parentListBlock instanceof ListBlock) {
=======
            $search = $this->parentListBlock;
            while ($search = $search->parent()) {
                if ($search instanceof ListBlock) {
                    $this->parentListBlock = $search;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
                    break;
                }
            }

            $this->parentLevel--;
        }

        $this->parentListBlock->appendChild($listItemToAdd);

        $this->lastListItem = $listItemToAdd;
    }
}
<<<<<<< HEAD

// Trigger autoload without causing a deprecated error
\class_exists(TableOfContents::class);
=======
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
