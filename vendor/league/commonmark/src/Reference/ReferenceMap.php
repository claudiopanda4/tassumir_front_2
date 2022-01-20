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

use League\CommonMark\Normalizer\TextNormalizer;

/**
 * A collection of references, indexed by label
 */
final class ReferenceMap implements ReferenceMapInterface
{
<<<<<<< HEAD
    /** @var TextNormalizer */
    private $normalizer;

    /**
     * @var ReferenceInterface[]
     */
    private $references = [];
=======
    /** @psalm-readonly */
    private TextNormalizer $normalizer;

    /**
     * @var array<string, ReferenceInterface>
     *
     * @psalm-readonly-allow-private-mutation
     */
    private array $references = [];
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

    public function __construct()
    {
        $this->normalizer = new TextNormalizer();
    }

<<<<<<< HEAD
    public function addReference(ReferenceInterface $reference): void
    {
        $key = $this->normalizer->normalize($reference->getLabel());

=======
    public function add(ReferenceInterface $reference): void
    {
        // Normalize the key
        $key = $this->normalizer->normalize($reference->getLabel());
        // Store the reference
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        $this->references[$key] = $reference;
    }

    public function contains(string $label): bool
    {
        $label = $this->normalizer->normalize($label);

        return isset($this->references[$label]);
    }

<<<<<<< HEAD
    public function getReference(string $label): ?ReferenceInterface
    {
        $label = $this->normalizer->normalize($label);

        if (!isset($this->references[$label])) {
            return null;
        }

        return $this->references[$label];
    }

    public function listReferences(): iterable
    {
        return \array_values($this->references);
=======
    public function get(string $label): ?ReferenceInterface
    {
        $label = $this->normalizer->normalize($label);

        return $this->references[$label] ?? null;
    }

    /**
     * @return \Traversable<string, ReferenceInterface>
     */
    public function getIterator(): \Traversable
    {
        foreach ($this->references as $normalizedLabel => $reference) {
            yield $normalizedLabel => $reference;
        }
    }

    public function count(): int
    {
        return \count($this->references);
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
