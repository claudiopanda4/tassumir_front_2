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

namespace League\CommonMark\Extension\HeadingPermalink;

<<<<<<< HEAD
use League\CommonMark\Inline\Element\AbstractInline;
=======
use League\CommonMark\Node\Inline\AbstractInline;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

/**
 * Represents an anchor link within a heading
 */
final class HeadingPermalink extends AbstractInline
{
<<<<<<< HEAD
    /** @var string */
    private $slug;

    public function __construct(string $slug)
    {
=======
    /** @psalm-readonly */
    private string $slug;

    public function __construct(string $slug)
    {
        parent::__construct();

>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        $this->slug = $slug;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }
}
