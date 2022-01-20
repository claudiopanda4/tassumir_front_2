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
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Util;

/**
 * Array collection
 *
 * Provides a wrapper around a standard PHP array.
 *
 * @internal
 *
<<<<<<< HEAD
 * @phpstan-template TKey
 * @phpstan-template TValue
 * @phpstan-implements \IteratorAggregate<TKey, TValue>
 * @phpstan-implements \ArrayAccess<TKey, TValue>
 */
class ArrayCollection implements \IteratorAggregate, \Countable, \ArrayAccess
{
    /**
     * @var array<int|string, mixed>
     * @phpstan-var array<TKey, TValue>
     */
    private $elements;
=======
 * @phpstan-template T
 * @phpstan-implements \IteratorAggregate<int, T>
 * @phpstan-implements \ArrayAccess<int, T>
 */
final class ArrayCollection implements \IteratorAggregate, \Countable, \ArrayAccess
{
    /**
     * @var array<int, mixed>
     * @phpstan-var array<int, T>
     */
    private array $elements;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

    /**
     * Constructor
     *
     * @param array<int|string, mixed> $elements
     *
<<<<<<< HEAD
     * @phpstan-param array<TKey, TValue> $elements
=======
     * @phpstan-param array<int, T> $elements
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
     */
    public function __construct(array $elements = [])
    {
        $this->elements = $elements;
<<<<<<< HEAD

        if (self::class !== static::class) {
            @\trigger_error('Extending the ArrayCollection class is deprecated in league/commonmark 1.6 and will not be allowed in 2.0', \E_USER_DEPRECATED);
        }
=======
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }

    /**
     * @return mixed|false
     *
<<<<<<< HEAD
     * @phpstan-return TValue|false
=======
     * @phpstan-return T|false
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
     */
    public function first()
    {
        return \reset($this->elements);
    }

    /**
     * @return mixed|false
     *
<<<<<<< HEAD
     * @phpstan-return TValue|false
=======
     * @phpstan-return T|false
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
     */
    public function last()
    {
        return \end($this->elements);
    }

    /**
     * Retrieve an external iterator
     *
<<<<<<< HEAD
     * @return \ArrayIterator<int|string, mixed>
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->elements);
    }

    /**
     * @param mixed $element
     *
     * @return bool
     *
     * @phpstan-param TValue $element
     *
     * @deprecated
     */
    public function add($element): bool
    {
        @trigger_error(sprintf('The "%s:%s" method is deprecated since league/commonmark 1.4, use "%s" instead.', self::class, 'add()', '$collection[] = $value'), E_USER_DEPRECATED);

        $this->elements[] = $element;

        return true;
    }

    /**
     * @param int|string $key
     * @param mixed      $value
     *
     * @return void
     *
     * @phpstan-param TKey   $key
     * @phpstan-param TValue $value
     *
     * @deprecated
     */
    public function set($key, $value)
    {
        @trigger_error(sprintf('The "%s:%s" method is deprecated since league/commonmark 1.4, use "%s" instead.', self::class, 'set()', '$collection[$key] = $value'), E_USER_DEPRECATED);

        $this->offsetSet($key, $value);
    }

    /**
     * @param int|string $key
     *
     * @return mixed
     *
     * @phpstan-param TKey $key
     *
     * @phpstan-return TValue|null
     *
     * @deprecated
     */
    public function get($key)
    {
        @trigger_error(sprintf('The "%s:%s" method is deprecated since league/commonmark 1.4, use "%s" instead.', self::class, 'get()', '$collection[$key]'), E_USER_DEPRECATED);

        return $this->offsetGet($key);
    }

    /**
     * @param int|string $key
     *
     * @return mixed
     *
     * @phpstan-param TKey $key
     *
     * @phpstan-return TValue|null
     *
     * @deprecated
     */
    public function remove($key)
    {
        @trigger_error(sprintf('The "%s:%s" method is deprecated since league/commonmark 1.4, use "%s" instead.', self::class, 'remove()', 'unset($collection[$key])'), E_USER_DEPRECATED);

        if (!\array_key_exists($key, $this->elements)) {
            return;
        }

        $removed = $this->elements[$key];
        unset($this->elements[$key]);

        return $removed;
    }

    /**
     * @return bool
     *
     * @deprecated
     */
    public function isEmpty(): bool
    {
        @trigger_error(sprintf('The "%s:%s" method is deprecated since league/commonmark 1.4, use "%s" instead.', self::class, 'isEmpty()', 'count($collection) === 0'), E_USER_DEPRECATED);

        return empty($this->elements);
    }

    /**
     * @param mixed $element
     *
     * @return bool
     *
     * @phpstan-param TValue $element
     *
     * @deprecated
     */
    public function contains($element): bool
    {
        @trigger_error(sprintf('The "%s:%s" method is deprecated since league/commonmark 1.4, use "%s" instead.', self::class, 'contains()', 'in_array($value, $collection->toArray(), true)'), E_USER_DEPRECATED);

        return \in_array($element, $this->elements, true);
    }

    /**
     * @param mixed $element
     *
     * @return mixed|false
     *
     * @phpstan-param TValue $element
     *
     * @deprecated
     */
    public function indexOf($element)
    {
        @trigger_error(sprintf('The "%s:%s" method is deprecated since league/commonmark 1.4, use "%s" instead.', self::class, 'indexOf()', 'array_search($value, $collection->toArray(), true)'), E_USER_DEPRECATED);

        return \array_search($element, $this->elements, true);
    }

    /**
     * @param int|string $key
     *
     * @return bool
     *
     * @phpstan-param TKey $key
     *
     * @deprecated
     */
    public function containsKey($key): bool
    {
        @trigger_error(sprintf('The "%s:%s" method is deprecated since league/commonmark 1.4, use "%s" instead.', self::class, 'containsKey()', 'isset($collection[$key])'), E_USER_DEPRECATED);

        return \array_key_exists($key, $this->elements);
=======
     * @return \ArrayIterator<int, mixed>
     *
     * @phpstan-return \ArrayIterator<int, T>
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->elements);
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }

    /**
     * Count elements of an object
     *
     * @return int The count as an integer.
     */
    public function count(): int
    {
        return \count($this->elements);
    }

    /**
     * Whether an offset exists
     *
<<<<<<< HEAD
     * @param int|string $offset An offset to check for.
     *
     * @return bool true on success or false on failure.
     *
     * @phpstan-param TKey $offset
=======
     * {@inheritDoc}
     *
     * @phpstan-param int $offset
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
     */
    public function offsetExists($offset): bool
    {
        return \array_key_exists($offset, $this->elements);
    }

    /**
     * Offset to retrieve
     *
<<<<<<< HEAD
     * @param int|string $offset
     *
     * @return mixed|null
     *
     * @phpstan-param TKey $offset
     *
     * @phpstan-return TValue|null
     */
=======
     * {@inheritDoc}
     *
     * @phpstan-param int $offset
     *
     * @phpstan-return T|null
     */
    #[\ReturnTypeWillChange]
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    public function offsetGet($offset)
    {
        return $this->elements[$offset] ?? null;
    }

    /**
     * Offset to set
     *
<<<<<<< HEAD
     * @param int|string|null $offset The offset to assign the value to.
     * @param mixed           $value  The value to set.
     *
     * @return void
     *
     * @phpstan-param TKey|null $offset
     * @phpstan-param TValue    $value
     */
    public function offsetSet($offset, $value)
=======
     * {@inheritDoc}
     *
     * @phpstan-param int|null $offset
     * @phpstan-param T        $value
     */
    public function offsetSet($offset, $value): void
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        if ($offset === null) {
            $this->elements[] = $value;
        } else {
            $this->elements[$offset] = $value;
        }
    }

    /**
     * Offset to unset
     *
<<<<<<< HEAD
     * @param int|string $offset The offset to unset.
     *
     * @return void
     *
     * @phpstan-param TKey $offset
     */
    public function offsetUnset($offset)
    {
        if (!\array_key_exists($offset, $this->elements)) {
=======
     * {@inheritDoc}
     *
     * @phpstan-param int $offset
     */
    public function offsetUnset($offset): void
    {
        if (! \array_key_exists($offset, $this->elements)) {
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            return;
        }

        unset($this->elements[$offset]);
    }

    /**
     * Returns a subset of the array
     *
<<<<<<< HEAD
     * @param int      $offset
     * @param int|null $length
     *
     * @return array<int|string, mixed>
     *
     * @phpstan-return array<TKey, TValue>
=======
     * @return array<int, mixed>
     *
     * @phpstan-return array<int, T>
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
     */
    public function slice(int $offset, ?int $length = null): array
    {
        return \array_slice($this->elements, $offset, $length, true);
    }

    /**
<<<<<<< HEAD
     * @return array<int|string, mixed>
     *
     * @phpstan-return array<TKey, TValue>
=======
     * @return array<int, mixed>
     *
     * @phpstan-return array<int, T>
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
     */
    public function toArray(): array
    {
        return $this->elements;
    }
<<<<<<< HEAD

    /**
     * @param array<int|string, mixed> $elements
     *
     * @return $this
     *
     * @phpstan-param array<TKey, TValue> $elements
     *
     * @deprecated
     */
    public function replaceWith(array $elements)
    {
        @trigger_error(sprintf('The "%s:%s" method is deprecated since league/commonmark 1.4.', self::class, 'replaceWith()'), E_USER_DEPRECATED);

        $this->elements = $elements;

        return $this;
    }

    /**
     * @deprecated
     *
     * @return void
     */
    public function removeGaps()
    {
        @trigger_error(sprintf('The "%s:%s" method is deprecated since league/commonmark 1.4.', self::class, 'removeGaps()'), E_USER_DEPRECATED);

        $this->elements = \array_filter($this->elements);
    }
=======
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
}
