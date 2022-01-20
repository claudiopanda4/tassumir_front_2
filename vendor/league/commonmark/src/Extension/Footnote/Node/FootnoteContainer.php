<?php

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 * (c) Rezo Zero / Ambroise Maupate
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace League\CommonMark\Extension\Footnote\Node;

<<<<<<< HEAD
use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Cursor;

/**
 * @method children() AbstractBlock[]
 */
final class FootnoteContainer extends AbstractBlock
{
    public function canContain(AbstractBlock $block): bool
    {
        return $block instanceof Footnote;
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

final class FootnoteContainer extends AbstractBlock
{
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
}
