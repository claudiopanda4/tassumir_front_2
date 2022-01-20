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

namespace League\CommonMark\Util;

/**
 * @internal
<<<<<<< HEAD
=======
 *
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
 * @phpstan-template T
 * @phpstan-implements \IteratorAggregate<T>
 */
final class PrioritizedList implements \IteratorAggregate
{
    /**
     * @var array<int, array<mixed>>
     * @phpstan-var array<int, array<T>>
     */
<<<<<<< HEAD
    private $list = [];

    /**
     * @var iterable<mixed>|null
     * @phpstan-var iterable<T>|null
     */
    private $optimized;

    /**
     * @param mixed $item
     * @param int   $priority
=======
    private array $list = [];

    /**
     * @var \Traversable<mixed>|null
     * @phpstan-var \Traversable<T>|null
     */
    private ?\Traversable $optimized = null;

    /**
     * @param mixed $item
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
     *
     * @phpstan-param T $item
     */
    public function add($item, int $priority): void
    {
        $this->list[$priority][] = $item;
<<<<<<< HEAD
        $this->optimized = null;
    }

    /**
     * @return iterable<int, mixed>
     *
     * @phpstan-return iterable<int, T>
     */
    public function getIterator(): iterable
=======
        $this->optimized         = null;
    }

    /**
     * @return \Traversable<int, mixed>
     *
     * @phpstan-return \Traversable<int, T>
     */
    public function getIterator(): \Traversable
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        if ($this->optimized === null) {
            \krsort($this->list);

            $sorted = [];
            foreach ($this->list as $group) {
                foreach ($group as $item) {
                    $sorted[] = $item;
                }
            }

            $this->optimized = new \ArrayIterator($sorted);
        }

        return $this->optimized;
    }
}
