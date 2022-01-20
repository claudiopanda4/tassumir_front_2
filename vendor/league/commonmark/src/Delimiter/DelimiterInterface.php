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

namespace League\CommonMark\Delimiter;

<<<<<<< HEAD
use League\CommonMark\Inline\Element\AbstractStringContainer;
=======
use League\CommonMark\Node\Inline\AbstractStringContainer;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

interface DelimiterInterface
{
    public function canClose(): bool;

    public function canOpen(): bool;

    public function isActive(): bool;

<<<<<<< HEAD
    /**
     * @param bool $active
     *
     * @return void
     */
    public function setActive(bool $active);

    /**
     * @return string
     */
=======
    public function setActive(bool $active): void;

>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    public function getChar(): string;

    public function getIndex(): ?int;

    public function getNext(): ?DelimiterInterface;

<<<<<<< HEAD
    /**
     * @param DelimiterInterface|null $next
     *
     * @return void
     */
    public function setNext(?DelimiterInterface $next);

    public function getLength(): int;

    /**
     * @param int $length
     *
     * @return void
     */
    public function setLength(int $length);
=======
    public function setNext(?DelimiterInterface $next): void;

    public function getLength(): int;

    public function setLength(int $length): void;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

    public function getOriginalLength(): int;

    public function getInlineNode(): AbstractStringContainer;

    public function getPrevious(): ?DelimiterInterface;

<<<<<<< HEAD
    /**
     * @param DelimiterInterface|null $previous
     *
     * @return mixed|void
     */
    public function setPrevious(?DelimiterInterface $previous);
=======
    public function setPrevious(?DelimiterInterface $previous): void;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
}
