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

namespace League\CommonMark\Node;

<<<<<<< HEAD
final class NodeWalker
{
    /**
     * @var Node
     */
    private $root;

    /**
     * @var Node|null
     */
    private $current;

    /**
     * @var bool
     */
    private $entering;

    public function __construct(Node $root)
    {
        $this->root = $root;
        $this->current = $this->root;
=======
use League\CommonMark\Node\Block\AbstractBlock;

final class NodeWalker
{
    /** @psalm-readonly */
    private Node $root;

    /** @psalm-readonly-allow-private-mutation */
    private ?Node $current = null;

    /** @psalm-readonly-allow-private-mutation */
    private bool $entering;

    public function __construct(Node $root)
    {
        $this->root     = $root;
        $this->current  = $this->root;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        $this->entering = true;
    }

    /**
     * Returns an event which contains node and entering flag
     * (entering is true when we enter a Node from a parent or sibling,
     * and false when we reenter it from child)
<<<<<<< HEAD
     *
     * @return NodeWalkerEvent|null
     */
    public function next(): ?NodeWalkerEvent
    {
        $current = $this->current;
        $entering = $this->entering;
        if (null === $current) {
            return null;
        }

        if ($entering && $current->isContainer()) {
            if ($current->firstChild()) {
                $this->current = $current->firstChild();
=======
     */
    public function next(): ?NodeWalkerEvent
    {
        $current  = $this->current;
        $entering = $this->entering;
        if ($current === null) {
            return null;
        }

        if ($entering && ($current instanceof AbstractBlock || $current->hasChildren())) {
            if ($current->firstChild()) {
                $this->current  = $current->firstChild();
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
                $this->entering = true;
            } else {
                $this->entering = false;
            }
        } elseif ($current === $this->root) {
            $this->current = null;
<<<<<<< HEAD
        } elseif (null === $current->next()) {
            $this->current = $current->parent();
            $this->entering = false;
        } else {
            $this->current = $current->next();
=======
        } elseif ($current->next() === null) {
            $this->current  = $current->parent();
            $this->entering = false;
        } else {
            $this->current  = $current->next();
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            $this->entering = true;
        }

        return new NodeWalkerEvent($current, $entering);
    }

    /**
     * Resets the iterator to resume at the specified node
<<<<<<< HEAD
     *
     * @param Node $node
     * @param bool $entering
     *
     * @return void
     */
    public function resumeAt(Node $node, bool $entering = true)
    {
        $this->current = $node;
=======
     */
    public function resumeAt(Node $node, bool $entering = true): void
    {
        $this->current  = $node;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        $this->entering = $entering;
    }
}
