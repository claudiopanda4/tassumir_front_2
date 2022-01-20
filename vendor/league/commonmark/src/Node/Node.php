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
abstract class Node
{
    /**
     * @var int
     */
    protected $depth = 0;

    /**
     * @var Node|null
     */
    protected $parent;

    /**
     * @var Node|null
     */
    protected $previous;

    /**
     * @var Node|null
     */
    protected $next;

    /**
     * @var Node|null
     */
    protected $firstChild;

    /**
     * @var Node|null
     */
    protected $lastChild;
=======
use Dflydev\DotAccessData\Data;

abstract class Node
{
    /** @psalm-readonly */
    public Data $data;

    /** @psalm-readonly-allow-private-mutation */
    protected int $depth = 0;

    /** @psalm-readonly-allow-private-mutation */
    protected ?Node $parent = null;

    /** @psalm-readonly-allow-private-mutation */
    protected ?Node $previous = null;

    /** @psalm-readonly-allow-private-mutation */
    protected ?Node $next = null;

    /** @psalm-readonly-allow-private-mutation */
    protected ?Node $firstChild = null;

    /** @psalm-readonly-allow-private-mutation */
    protected ?Node $lastChild = null;

    public function __construct()
    {
        $this->data = new Data([
            'attributes' => [],
        ]);
    }
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

    public function previous(): ?Node
    {
        return $this->previous;
    }

    public function next(): ?Node
    {
        return $this->next;
    }

    public function parent(): ?Node
    {
        return $this->parent;
    }

<<<<<<< HEAD
    /**
     * @param Node|null $node
     *
     * @return void
     */
    protected function setParent(Node $node = null)
    {
        $this->parent = $node;
        $this->depth = ($node === null) ? 0 : $node->depth + 1;
=======
    protected function setParent(?Node $node = null): void
    {
        $this->parent = $node;
        $this->depth  = $node === null ? 0 : $node->depth + 1;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }

    /**
     * Inserts the $sibling node after $this
<<<<<<< HEAD
     *
     * @param Node $sibling
     *
     * @return void
     */
    public function insertAfter(Node $sibling)
=======
     */
    public function insertAfter(Node $sibling): void
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        $sibling->detach();
        $sibling->next = $this->next;

        if ($sibling->next) {
            $sibling->next->previous = $sibling;
        }

        $sibling->previous = $this;
<<<<<<< HEAD
        $this->next = $sibling;
        $sibling->setParent($this->parent);

        if (!$sibling->next && $sibling->parent) {
=======
        $this->next        = $sibling;
        $sibling->setParent($this->parent);

        if (! $sibling->next && $sibling->parent) {
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            $sibling->parent->lastChild = $sibling;
        }
    }

    /**
     * Inserts the $sibling node before $this
<<<<<<< HEAD
     *
     * @param Node $sibling
     *
     * @return void
     */
    public function insertBefore(Node $sibling)
=======
     */
    public function insertBefore(Node $sibling): void
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        $sibling->detach();
        $sibling->previous = $this->previous;

        if ($sibling->previous) {
            $sibling->previous->next = $sibling;
        }

<<<<<<< HEAD
        $sibling->next = $this;
        $this->previous = $sibling;
        $sibling->setParent($this->parent);

        if (!$sibling->previous && $sibling->parent) {
=======
        $sibling->next  = $this;
        $this->previous = $sibling;
        $sibling->setParent($this->parent);

        if (! $sibling->previous && $sibling->parent) {
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            $sibling->parent->firstChild = $sibling;
        }
    }

<<<<<<< HEAD
    /**
     * @param Node $replacement
     *
     * @return void
     */
    public function replaceWith(Node $replacement)
=======
    public function replaceWith(Node $replacement): void
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        $replacement->detach();
        $this->insertAfter($replacement);
        $this->detach();
    }

<<<<<<< HEAD
    /**
     * @return void
     */
    public function detach()
=======
    public function detach(): void
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        if ($this->previous) {
            $this->previous->next = $this->next;
        } elseif ($this->parent) {
            $this->parent->firstChild = $this->next;
        }

        if ($this->next) {
            $this->next->previous = $this->previous;
        } elseif ($this->parent) {
            $this->parent->lastChild = $this->previous;
        }

<<<<<<< HEAD
        $this->parent = null;
        $this->next = null;
        $this->previous = null;
        $this->depth = 0;
    }

    abstract public function isContainer(): bool;
=======
        $this->parent   = null;
        $this->next     = null;
        $this->previous = null;
        $this->depth    = 0;
    }

    public function hasChildren(): bool
    {
        return $this->firstChild !== null;
    }
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

    public function firstChild(): ?Node
    {
        return $this->firstChild;
    }

    public function lastChild(): ?Node
    {
        return $this->lastChild;
    }

    /**
     * @return Node[]
     */
    public function children(): iterable
    {
        $children = [];
<<<<<<< HEAD
        for ($current = $this->firstChild; null !== $current; $current = $current->next) {
=======
        for ($current = $this->firstChild; $current !== null; $current = $current->next) {
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            $children[] = $current;
        }

        return $children;
    }

<<<<<<< HEAD
    /**
     * @param Node $child
     *
     * @return void
     */
    public function appendChild(Node $child)
=======
    public function appendChild(Node $child): void
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        if ($this->lastChild) {
            $this->lastChild->insertAfter($child);
        } else {
            $child->detach();
            $child->setParent($this);
            $this->lastChild = $this->firstChild = $child;
        }
    }

    /**
     * Adds $child as the very first child of $this
<<<<<<< HEAD
     *
     * @param Node $child
     *
     * @return void
     */
    public function prependChild(Node $child)
=======
     */
    public function prependChild(Node $child): void
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        if ($this->firstChild) {
            $this->firstChild->insertBefore($child);
        } else {
            $child->detach();
            $child->setParent($this);
            $this->lastChild = $this->firstChild = $child;
        }
    }

    /**
     * Detaches all child nodes of given node
<<<<<<< HEAD
     *
     * @return void
     */
    public function detachChildren()
=======
     */
    public function detachChildren(): void
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        foreach ($this->children() as $children) {
            $children->setParent(null);
        }
<<<<<<< HEAD
=======

>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        $this->firstChild = $this->lastChild = null;
    }

    /**
     * Replace all children of given node with collection of another
     *
     * @param iterable<Node> $children
<<<<<<< HEAD
     *
     * @return $this
     */
    public function replaceChildren(iterable $children)
=======
     */
    public function replaceChildren(iterable $children): void
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        $this->detachChildren();
        foreach ($children as $item) {
            $this->appendChild($item);
        }
<<<<<<< HEAD

        return $this;
=======
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }

    public function getDepth(): int
    {
        return $this->depth;
    }

    public function walker(): NodeWalker
    {
        return new NodeWalker($this);
    }

<<<<<<< HEAD
=======
    public function iterator(int $flags = 0): NodeIterator
    {
        return new NodeIterator($this, $flags);
    }

>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    /**
     * Clone the current node and its children
     *
     * WARNING: This is a recursive function and should not be called on deeply-nested node trees!
     */
    public function __clone()
    {
        // Cloned nodes are detached from their parents, siblings, and children
<<<<<<< HEAD
        $this->parent = null;
        $this->previous = null;
        $this->next = null;
=======
        $this->parent   = null;
        $this->previous = null;
        $this->next     = null;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        // But save a copy of the children since we'll need that in a moment
        $children = $this->children();
        $this->detachChildren();

        // The original children get cloned and re-added
        foreach ($children as $child) {
            $this->appendChild(clone $child);
        }
    }
<<<<<<< HEAD
=======

    public static function assertInstanceOf(Node $node): void
    {
        if (! $node instanceof static) {
            throw new \InvalidArgumentException(\sprintf('Incompatible node type: expected %s, got %s', static::class, \get_class($node)));
        }
    }
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
}
