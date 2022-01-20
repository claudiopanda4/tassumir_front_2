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
 * Additional emphasis processing code based on commonmark-java (https://github.com/atlassian/commonmark-java)
 *  - (c) Atlassian Pty Ltd
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Delimiter;

use League\CommonMark\Delimiter\Processor\DelimiterProcessorCollection;
<<<<<<< HEAD
use League\CommonMark\Inline\AdjacentTextMerger;

final class DelimiterStack
{
    /**
     * @var DelimiterInterface|null
     */
    private $top;

    /**
     * @param DelimiterInterface $newDelimiter
     *
     * @return void
     */
    public function push(DelimiterInterface $newDelimiter)
=======
use League\CommonMark\Node\Inline\AdjacentTextMerger;

final class DelimiterStack
{
    /** @psalm-readonly-allow-private-mutation */
    private ?DelimiterInterface $top = null;

    public function push(DelimiterInterface $newDelimiter): void
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        $newDelimiter->setPrevious($this->top);

        if ($this->top !== null) {
            $this->top->setNext($newDelimiter);
        }

        $this->top = $newDelimiter;
    }

<<<<<<< HEAD
    private function findEarliest(DelimiterInterface $stackBottom = null): ?DelimiterInterface
=======
    private function findEarliest(?DelimiterInterface $stackBottom = null): ?DelimiterInterface
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        $delimiter = $this->top;
        while ($delimiter !== null && $delimiter->getPrevious() !== $stackBottom) {
            $delimiter = $delimiter->getPrevious();
        }

        return $delimiter;
    }

<<<<<<< HEAD
    /**
     * @param DelimiterInterface $delimiter
     *
     * @return void
     */
    public function removeDelimiter(DelimiterInterface $delimiter)
    {
        if ($delimiter->getPrevious() !== null) {
=======
    public function removeDelimiter(DelimiterInterface $delimiter): void
    {
        if ($delimiter->getPrevious() !== null) {
            /** @psalm-suppress PossiblyNullReference */
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            $delimiter->getPrevious()->setNext($delimiter->getNext());
        }

        if ($delimiter->getNext() === null) {
            // top of stack
            $this->top = $delimiter->getPrevious();
        } else {
<<<<<<< HEAD
=======
            /** @psalm-suppress PossiblyNullReference */
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            $delimiter->getNext()->setPrevious($delimiter->getPrevious());
        }
    }

    private function removeDelimiterAndNode(DelimiterInterface $delimiter): void
    {
        $delimiter->getInlineNode()->detach();
        $this->removeDelimiter($delimiter);
    }

    private function removeDelimitersBetween(DelimiterInterface $opener, DelimiterInterface $closer): void
    {
        $delimiter = $closer->getPrevious();
        while ($delimiter !== null && $delimiter !== $opener) {
            $previous = $delimiter->getPrevious();
            $this->removeDelimiter($delimiter);
            $delimiter = $previous;
        }
    }

<<<<<<< HEAD
    /**
     * @param DelimiterInterface|null $stackBottom
     *
     * @return void
     */
    public function removeAll(DelimiterInterface $stackBottom = null)
=======
    public function removeAll(?DelimiterInterface $stackBottom = null): void
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        while ($this->top && $this->top !== $stackBottom) {
            $this->removeDelimiter($this->top);
        }
    }

<<<<<<< HEAD
    /**
     * @param string $character
     *
     * @return void
     */
    public function removeEarlierMatches(string $character)
=======
    public function removeEarlierMatches(string $character): void
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        $opener = $this->top;
        while ($opener !== null) {
            if ($opener->getChar() === $character) {
                $opener->setActive(false);
            }

            $opener = $opener->getPrevious();
        }
    }

    /**
     * @param string|string[] $characters
<<<<<<< HEAD
     *
     * @return DelimiterInterface|null
     */
    public function searchByCharacter($characters): ?DelimiterInterface
    {
        if (!\is_array($characters)) {
=======
     */
    public function searchByCharacter($characters): ?DelimiterInterface
    {
        if (! \is_array($characters)) {
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            $characters = [$characters];
        }

        $opener = $this->top;
        while ($opener !== null) {
<<<<<<< HEAD
            if (\in_array($opener->getChar(), $characters)) {
                break;
            }
=======
            if (\in_array($opener->getChar(), $characters, true)) {
                break;
            }

>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            $opener = $opener->getPrevious();
        }

        return $opener;
    }

<<<<<<< HEAD
    /**
     * @param DelimiterInterface|null      $stackBottom
     * @param DelimiterProcessorCollection $processors
     *
     * @return void
     */
    public function processDelimiters(?DelimiterInterface $stackBottom, DelimiterProcessorCollection $processors)
=======
    public function processDelimiters(?DelimiterInterface $stackBottom, DelimiterProcessorCollection $processors): void
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        $openersBottom = [];

        // Find first closer above stackBottom
        $closer = $this->findEarliest($stackBottom);

        // Move forward, looking for closers, and handling each
        while ($closer !== null) {
            $delimiterChar = $closer->getChar();

            $delimiterProcessor = $processors->getDelimiterProcessor($delimiterChar);
<<<<<<< HEAD
            if (!$closer->canClose() || $delimiterProcessor === null) {
=======
            if (! $closer->canClose() || $delimiterProcessor === null) {
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
                $closer = $closer->getNext();
                continue;
            }

            $openingDelimiterChar = $delimiterProcessor->getOpeningCharacter();

<<<<<<< HEAD
            $useDelims = 0;
            $openerFound = false;
            $potentialOpenerFound = false;
            $opener = $closer->getPrevious();
            while ($opener !== null && $opener !== $stackBottom && $opener !== ($openersBottom[$delimiterChar] ?? null)) {
                if ($opener->canOpen() && $opener->getChar() === $openingDelimiterChar) {
                    $potentialOpenerFound = true;
                    $useDelims = $delimiterProcessor->getDelimiterUse($opener, $closer);
=======
            $useDelims            = 0;
            $openerFound          = false;
            $potentialOpenerFound = false;
            $opener               = $closer->getPrevious();
            while ($opener !== null && $opener !== $stackBottom && $opener !== ($openersBottom[$delimiterChar] ?? null)) {
                if ($opener->canOpen() && $opener->getChar() === $openingDelimiterChar) {
                    $potentialOpenerFound = true;
                    $useDelims            = $delimiterProcessor->getDelimiterUse($opener, $closer);
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
                    if ($useDelims > 0) {
                        $openerFound = true;
                        break;
                    }
                }
<<<<<<< HEAD
                $opener = $opener->getPrevious();
            }

            if (!$openerFound) {
                if (!$potentialOpenerFound) {
=======

                $opener = $opener->getPrevious();
            }

            if (! $openerFound) {
                if (! $potentialOpenerFound) {
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
                    // Only do this when we didn't even have a potential
                    // opener (one that matches the character and can open).
                    // If an opener was rejected because of the number of
                    // delimiters (e.g. because of the "multiple of 3"
                    // Set lower bound for future searches for openersrule),
                    // we want to consider it next time because the number
                    // of delimiters can change as we continue processing.
                    $openersBottom[$delimiterChar] = $closer->getPrevious();
<<<<<<< HEAD
                    if (!$closer->canOpen()) {
=======
                    if (! $closer->canOpen()) {
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
                        // We can remove a closer that can't be an opener,
                        // once we've seen there's no matching opener.
                        $this->removeDelimiter($closer);
                    }
                }
<<<<<<< HEAD
=======

>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
                $closer = $closer->getNext();
                continue;
            }

<<<<<<< HEAD
=======
            \assert($opener !== null);

>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            $openerNode = $opener->getInlineNode();
            $closerNode = $closer->getInlineNode();

            // Remove number of used delimiters from stack and inline nodes.
            $opener->setLength($opener->getLength() - $useDelims);
            $closer->setLength($closer->getLength() - $useDelims);

<<<<<<< HEAD
            $openerNode->setContent(\substr($openerNode->getContent(), 0, -$useDelims));
            $closerNode->setContent(\substr($closerNode->getContent(), 0, -$useDelims));
=======
            $openerNode->setLiteral(\substr($openerNode->getLiteral(), 0, -$useDelims));
            $closerNode->setLiteral(\substr($closerNode->getLiteral(), 0, -$useDelims));
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

            $this->removeDelimitersBetween($opener, $closer);
            // The delimiter processor can re-parent the nodes between opener and closer,
            // so make sure they're contiguous already. Exclusive because we want to keep opener/closer themselves.
            AdjacentTextMerger::mergeTextNodesBetweenExclusive($openerNode, $closerNode);
            $delimiterProcessor->process($openerNode, $closerNode, $useDelims);

            // No delimiter characters left to process, so we can remove delimiter and the now empty node.
            if ($opener->getLength() === 0) {
                $this->removeDelimiterAndNode($opener);
            }

<<<<<<< HEAD
=======
            // phpcs:disable SlevomatCodingStandard.ControlStructures.EarlyExit.EarlyExitNotUsed
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            if ($closer->getLength() === 0) {
                $next = $closer->getNext();
                $this->removeDelimiterAndNode($closer);
                $closer = $next;
            }
        }

        // Remove all delimiters
        $this->removeAll($stackBottom);
    }
}
