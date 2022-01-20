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
use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Cursor;
use League\CommonMark\Reference\ReferenceInterface;

/**
 * @method children() AbstractBlock[]
 */
final class Footnote extends AbstractBlock
{
    /**
     * @var FootnoteBackref[]
     */
    private $backrefs = [];

    /**
     * @var ReferenceInterface
     */
    private $reference;

    public function __construct(ReferenceInterface $reference)
    {
        $this->reference = $reference;
    }

    public function canContain(AbstractBlock $block): bool
    {
        return true;
    }

    public function isCode(): bool
    {
        return false;
    }

    public function matchesNextLine(Cursor $cursor): bool
    {
        return false;
=======
use League\CommonMark\Node\Block\AbstractBlock;
use League\CommonMark\Reference\ReferenceInterface;
use League\CommonMark\Reference\ReferenceableInterface;

final class Footnote extends AbstractBlock implements ReferenceableInterface
{
    /** @psalm-readonly */
    private ReferenceInterface $reference;

    public function __construct(ReferenceInterface $reference)
    {
        parent::__construct();

        $this->reference = $reference;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }

    public function getReference(): ReferenceInterface
    {
        return $this->reference;
    }
<<<<<<< HEAD

    public function addBackref(FootnoteBackref $backref): self
    {
        $this->backrefs[] = $backref;

        return $this;
    }

    /**
     * @return FootnoteBackref[]
     */
    public function getBackrefs(): array
    {
        return $this->backrefs;
    }
=======
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
}
