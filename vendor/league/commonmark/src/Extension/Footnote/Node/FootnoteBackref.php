<?php

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 * (c) Rezo Zero / Ambroise Maupate
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace League\CommonMark\Extension\Footnote\Node;

<<<<<<< HEAD
use League\CommonMark\Inline\Element\AbstractInline;
use League\CommonMark\Reference\ReferenceInterface;
=======
use League\CommonMark\Node\Inline\AbstractInline;
use League\CommonMark\Reference\ReferenceInterface;
use League\CommonMark\Reference\ReferenceableInterface;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

/**
 * Link from the footnote on the bottom of the document back to the reference
 */
<<<<<<< HEAD
final class FootnoteBackref extends AbstractInline
{
    /** @var ReferenceInterface */
    private $reference;

    public function __construct(ReferenceInterface $reference)
    {
=======
final class FootnoteBackref extends AbstractInline implements ReferenceableInterface
{
    /** @psalm-readonly */
    private ReferenceInterface $reference;

    public function __construct(ReferenceInterface $reference)
    {
        parent::__construct();

>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        $this->reference = $reference;
    }

    public function getReference(): ReferenceInterface
    {
        return $this->reference;
    }
}
