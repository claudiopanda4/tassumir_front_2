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

namespace League\CommonMark\Reference;

/**
 * A collection of references
<<<<<<< HEAD
 */
interface ReferenceMapInterface
{
    /**
     * @param ReferenceInterface $reference
     *
     * @return void
     */
    public function addReference(ReferenceInterface $reference): void;

    /**
     * @param string $label
     *
     * @return bool
     */
    public function contains(string $label): bool;

    /**
     * @param string $label
     *
     * @return ReferenceInterface|null
     */
    public function getReference(string $label): ?ReferenceInterface;

    /**
     * Lists all registered references.
     *
     * @return ReferenceInterface[]
     */
    public function listReferences(): iterable;
=======
 *
 * @phpstan-extends \IteratorAggregate<ReferenceInterface>
 */
interface ReferenceMapInterface extends \IteratorAggregate, \Countable
{
    public function add(ReferenceInterface $reference): void;

    public function contains(string $label): bool;

    public function get(string $label): ?ReferenceInterface;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
}
