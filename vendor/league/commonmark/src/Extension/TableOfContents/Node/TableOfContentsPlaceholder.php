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

namespace League\CommonMark\Extension\TableOfContents\Node;

<<<<<<< HEAD
use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Cursor;

final class TableOfContentsPlaceholder extends AbstractBlock
{
    public function canContain(AbstractBlock $block): bool
    {
        return false;
    }

    public function isCode(): bool
    {
        return false;
    }

    public function matchesNextLine(Cursor $cursor): bool
    {
        return false;
    }
=======
use League\CommonMark\Node\Block\AbstractBlock;

final class TableOfContentsPlaceholder extends AbstractBlock
{
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
}
