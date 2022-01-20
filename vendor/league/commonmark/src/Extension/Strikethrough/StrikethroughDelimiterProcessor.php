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

use League\CommonMark\Delimiter\DelimiterInterface;
use League\CommonMark\Delimiter\Processor\DelimiterProcessorInterface;
<<<<<<< HEAD
use League\CommonMark\Inline\Element\AbstractStringContainer;
=======
use League\CommonMark\Node\Inline\AbstractStringContainer;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

final class StrikethroughDelimiterProcessor implements DelimiterProcessorInterface
{
    public function getOpeningCharacter(): string
    {
        return '~';
    }

    public function getClosingCharacter(): string
    {
        return '~';
    }

    public function getMinLength(): int
    {
        return 2;
    }

    public function getDelimiterUse(DelimiterInterface $opener, DelimiterInterface $closer): int
    {
        $min = \min($opener->getLength(), $closer->getLength());

        return $min >= 2 ? $min : 0;
    }

<<<<<<< HEAD
    public function process(AbstractStringContainer $opener, AbstractStringContainer $closer, int $delimiterUse)
    {
        $strikethrough = new Strikethrough();
=======
    public function process(AbstractStringContainer $opener, AbstractStringContainer $closer, int $delimiterUse): void
    {
        $strikethrough = new Strikethrough(\str_repeat('~', $delimiterUse));
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

        $tmp = $opener->next();
        while ($tmp !== null && $tmp !== $closer) {
            $next = $tmp->next();
            $strikethrough->appendChild($tmp);
            $tmp = $next;
        }

        $opener->insertAfter($strikethrough);
    }
}
