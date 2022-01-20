<?php

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 * (c) 2015 Martin Hasoň <martin.hason@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace League\CommonMark\Extension\Attributes\Node;

<<<<<<< HEAD
use League\CommonMark\Inline\Element\AbstractInline;
=======
use League\CommonMark\Node\Inline\AbstractInline;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

final class AttributesInline extends AbstractInline
{
    /** @var array<string, mixed> */
<<<<<<< HEAD
    public $attributes;

    /** @var bool */
    public $block;

    /**
     * @param array<string, mixed> $attributes
     * @param bool                 $block
     */
    public function __construct(array $attributes, bool $block)
    {
        $this->attributes = $attributes;
        $this->block = $block;
        $this->data = ['delim' => true]; // TODO: Re-implement as a delimiter?
=======
    private array $attributes;

    private bool $block;

    /**
     * @param array<string, mixed> $attributes
     */
    public function __construct(array $attributes, bool $block)
    {
        parent::__construct();

        $this->attributes = $attributes;
        $this->block      = $block;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }

    /**
     * @return array<string, mixed>
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

<<<<<<< HEAD
=======
    /**
     * @param array<string, mixed> $attributes
     */
    public function setAttributes(array $attributes): void
    {
        $this->attributes = $attributes;
    }

>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    public function isBlock(): bool
    {
        return $this->block;
    }
}
