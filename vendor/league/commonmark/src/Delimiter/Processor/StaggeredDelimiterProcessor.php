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
 * Additional emphasis processing code based on commonmark-java (https://github.com/atlassian/commonmark-java)
 *  - (c) Atlassian Pty Ltd
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Delimiter\Processor;

use League\CommonMark\Delimiter\DelimiterInterface;
<<<<<<< HEAD
use League\CommonMark\Inline\Element\AbstractStringContainer;
=======
use League\CommonMark\Node\Inline\AbstractStringContainer;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

/**
 * An implementation of DelimiterProcessorInterface that dispatches all calls to two or more other DelimiterProcessors
 * depending on the length of the delimiter run. All child DelimiterProcessors must have different minimum
 * lengths. A given delimiter run is dispatched to the child with the largest acceptable minimum length. If no
 * child is applicable, the one with the largest minimum length is chosen.
 *
 * @internal
 */
final class StaggeredDelimiterProcessor implements DelimiterProcessorInterface
{
<<<<<<< HEAD
    /** @var string */
    private $delimiterChar;

    /** @var int */
    private $minLength = 0;

    /** @var array<int, DelimiterProcessorInterface>|DelimiterProcessorInterface[] */
    private $processors = []; // keyed by minLength in reverse order
=======
    /** @psalm-readonly */
    private string $delimiterChar;

    /** @psalm-readonly-allow-private-mutation */
    private int $minLength = 0;

    /**
     * @var array<int, DelimiterProcessorInterface>|DelimiterProcessorInterface[]
     *
     * @psalm-readonly-allow-private-mutation
     */
    private array $processors = []; // keyed by minLength in reverse order
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

    public function __construct(string $char, DelimiterProcessorInterface $processor)
    {
        $this->delimiterChar = $char;
        $this->add($processor);
    }

    public function getOpeningCharacter(): string
    {
        return $this->delimiterChar;
    }

    public function getClosingCharacter(): string
    {
        return $this->delimiterChar;
    }

    public function getMinLength(): int
    {
        return $this->minLength;
    }

    /**
     * Adds the given processor to this staggered delimiter processor
<<<<<<< HEAD
     *
     * @param DelimiterProcessorInterface $processor
     *
     * @return void
     */
    public function add(DelimiterProcessorInterface $processor)
=======
     */
    public function add(DelimiterProcessorInterface $processor): void
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        $len = $processor->getMinLength();

        if (isset($this->processors[$len])) {
            throw new \InvalidArgumentException(\sprintf('Cannot add two delimiter processors for char "%s" and minimum length %d', $this->delimiterChar, $len));
        }

        $this->processors[$len] = $processor;
        \krsort($this->processors);

        $this->minLength = \min($this->minLength, $len);
    }

    public function getDelimiterUse(DelimiterInterface $opener, DelimiterInterface $closer): int
    {
        return $this->findProcessor($opener->getLength())->getDelimiterUse($opener, $closer);
    }

<<<<<<< HEAD
    public function process(AbstractStringContainer $opener, AbstractStringContainer $closer, int $delimiterUse)
=======
    public function process(AbstractStringContainer $opener, AbstractStringContainer $closer, int $delimiterUse): void
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        $this->findProcessor($delimiterUse)->process($opener, $closer, $delimiterUse);
    }

    private function findProcessor(int $len): DelimiterProcessorInterface
    {
        // Find the "longest" processor which can handle this length
        foreach ($this->processors as $processor) {
            if ($processor->getMinLength() <= $len) {
                return $processor;
            }
        }

        // Just use the first one in our list
<<<<<<< HEAD
        /** @var DelimiterProcessorInterface $first */
        $first = \reset($this->processors);
=======
        $first = \reset($this->processors);
        \assert($first instanceof DelimiterProcessorInterface);
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

        return $first;
    }
}
