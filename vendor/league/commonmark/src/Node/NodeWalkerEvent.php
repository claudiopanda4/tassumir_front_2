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

final class NodeWalkerEvent
{
<<<<<<< HEAD
    /**
     * @var Node
     */
    private $node;

    /**
     * @var bool
     */
    private $isEntering;

    /**
     * @param Node $node
     * @param bool $isEntering
     */
    public function __construct(Node $node, $isEntering = true)
    {
        $this->node = $node;
=======
    /** @psalm-readonly */
    private Node $node;

    /** @psalm-readonly */
    private bool $isEntering;

    public function __construct(Node $node, bool $isEntering = true)
    {
        $this->node       = $node;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        $this->isEntering = $isEntering;
    }

    public function getNode(): Node
    {
        return $this->node;
    }

    public function isEntering(): bool
    {
        return $this->isEntering;
    }
}
