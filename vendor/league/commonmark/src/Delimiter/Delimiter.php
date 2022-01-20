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

final class Delimiter implements DelimiterInterface
{
    /** @var string */
    private $char;

    /** @var int */
    private $length;

    /** @var int */
    private $originalLength;

    /** @var AbstractStringContainer */
    private $inlineNode;

    /** @var DelimiterInterface|null */
    private $previous;

    /** @var DelimiterInterface|null */
    private $next;

    /** @var bool */
    private $canOpen;

    /** @var bool */
    private $canClose;

    /** @var bool */
    private $active;

    /** @var int|null */
    private $index;

    /**
     * @param string                  $char
     * @param int                     $numDelims
     * @param AbstractStringContainer $node
     * @param bool                    $canOpen
     * @param bool                    $canClose
     * @param int|null                $index
     */
    public function __construct(string $char, int $numDelims, AbstractStringContainer $node, bool $canOpen, bool $canClose, ?int $index = null)
    {
        $this->char = $char;
        $this->length = $numDelims;
        $this->originalLength = $numDelims;
        $this->inlineNode = $node;
        $this->canOpen = $canOpen;
        $this->canClose = $canClose;
        $this->active = true;
        $this->index = $index;
=======
use League\CommonMark\Node\Inline\AbstractStringContainer;

final class Delimiter implements DelimiterInterface
{
    /** @psalm-readonly */
    private string $char;

    /** @psalm-readonly-allow-private-mutation */
    private int $length;

    /** @psalm-readonly */
    private int $originalLength;

    /** @psalm-readonly */
    private AbstractStringContainer $inlineNode;

    /** @psalm-readonly-allow-private-mutation */
    private ?DelimiterInterface $previous = null;

    /** @psalm-readonly-allow-private-mutation */
    private ?DelimiterInterface $next = null;

    /** @psalm-readonly */
    private bool $canOpen;

    /** @psalm-readonly */
    private bool $canClose;

    /** @psalm-readonly-allow-private-mutation */
    private bool $active;

    /** @psalm-readonly */
    private ?int $index = null;

    public function __construct(string $char, int $numDelims, AbstractStringContainer $node, bool $canOpen, bool $canClose, ?int $index = null)
    {
        $this->char           = $char;
        $this->length         = $numDelims;
        $this->originalLength = $numDelims;
        $this->inlineNode     = $node;
        $this->canOpen        = $canOpen;
        $this->canClose       = $canClose;
        $this->active         = true;
        $this->index          = $index;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }

    public function canClose(): bool
    {
        return $this->canClose;
    }

<<<<<<< HEAD
    /**
     * @param bool $canClose
     *
     * @return void
     */
    public function setCanClose(bool $canClose)
    {
        $this->canClose = $canClose;
    }

=======
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    public function canOpen(): bool
    {
        return $this->canOpen;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

<<<<<<< HEAD
    public function setActive(bool $active)
=======
    public function setActive(bool $active): void
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        $this->active = $active;
    }

    public function getChar(): string
    {
        return $this->char;
    }

    public function getIndex(): ?int
    {
        return $this->index;
    }

    public function getNext(): ?DelimiterInterface
    {
        return $this->next;
    }

<<<<<<< HEAD
    public function setNext(?DelimiterInterface $next)
=======
    public function setNext(?DelimiterInterface $next): void
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        $this->next = $next;
    }

    public function getLength(): int
    {
        return $this->length;
    }

<<<<<<< HEAD
    public function setLength(int $length)
=======
    public function setLength(int $length): void
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        $this->length = $length;
    }

    public function getOriginalLength(): int
    {
        return $this->originalLength;
    }

    public function getInlineNode(): AbstractStringContainer
    {
        return $this->inlineNode;
    }

    public function getPrevious(): ?DelimiterInterface
    {
        return $this->previous;
    }

<<<<<<< HEAD
    public function setPrevious(?DelimiterInterface $previous): DelimiterInterface
    {
        $this->previous = $previous;

        return $this;
=======
    public function setPrevious(?DelimiterInterface $previous): void
    {
        $this->previous = $previous;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
