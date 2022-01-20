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

final class FootnoteRef extends AbstractInline
{
    /** @var ReferenceInterface */
    private $reference;

    /** @var string|null */
    private $content;

    /**
     * @param ReferenceInterface $reference
     * @param string|null        $content
     * @param array<mixed>       $data
     */
    public function __construct(ReferenceInterface $reference, ?string $content = null, array $data = [])
    {
        $this->reference = $reference;
        $this->content = $content;
        $this->data = $data;
=======
use League\CommonMark\Node\Inline\AbstractInline;
use League\CommonMark\Reference\ReferenceInterface;
use League\CommonMark\Reference\ReferenceableInterface;

final class FootnoteRef extends AbstractInline implements ReferenceableInterface
{
    private ReferenceInterface $reference;

    /** @psalm-readonly */
    private ?string $content = null;

    /**
     * @param array<mixed> $data
     */
    public function __construct(ReferenceInterface $reference, ?string $content = null, array $data = [])
    {
        parent::__construct();

        $this->reference = $reference;
        $this->content   = $content;

        $this->data->import($data);
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }

    public function getReference(): ReferenceInterface
    {
        return $this->reference;
    }

<<<<<<< HEAD
    public function setReference(ReferenceInterface $reference): FootnoteRef
    {
        $this->reference = $reference;

        return $this;
=======
    public function setReference(ReferenceInterface $reference): void
    {
        $this->reference = $reference;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }

    public function getContent(): ?string
    {
        return $this->content;
    }
}
