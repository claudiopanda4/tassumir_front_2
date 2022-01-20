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
use League\CommonMark\Inline\Element\AbstractInline;

final class Strikethrough extends AbstractInline
{
    public function isContainer(): bool
    {
        return true;
=======
use League\CommonMark\Node\Inline\AbstractInline;
use League\CommonMark\Node\Inline\DelimitedInterface;

final class Strikethrough extends AbstractInline implements DelimitedInterface
{
    private string $delimiter;

    public function __construct(string $delimiter = '~~')
    {
        parent::__construct();

        $this->delimiter = $delimiter;
    }

    public function getOpeningDelimiter(): string
    {
        return $this->delimiter;
    }

    public function getClosingDelimiter(): string
    {
        return $this->delimiter;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
