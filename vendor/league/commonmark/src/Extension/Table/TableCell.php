<?php

declare(strict_types=1);

/*
 * This is part of the league/commonmark package.
 *
 * (c) Martin Hasoň <martin.hason@gmail.com>
 * (c) Webuni s.r.o. <info@webuni.cz>
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Extension\Table;

<<<<<<< HEAD
use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Block\Element\AbstractStringContainerBlock;
use League\CommonMark\Block\Element\InlineContainerInterface;
use League\CommonMark\ContextInterface;
use League\CommonMark\Cursor;

final class TableCell extends AbstractStringContainerBlock implements InlineContainerInterface
{
    const TYPE_HEAD = 'th';
    const TYPE_BODY = 'td';

    const ALIGN_LEFT = 'left';
    const ALIGN_RIGHT = 'right';
    const ALIGN_CENTER = 'center';

    /** @var string */
    public $type = self::TYPE_BODY;

    /** @var string|null */
    public $align;

    public function __construct(string $string = '', string $type = self::TYPE_BODY, string $align = null)
    {
        parent::__construct();
        $this->finalStringContents = $string;
        $this->addLine($string);
        $this->type = $type;
        $this->align = $align;
    }

    public function canContain(AbstractBlock $block): bool
    {
        return false;
    }

    public function isCode(): bool
    {
        return false;
    }

    public function matchesNextLine(Cursor $cursor): bool
    {
        return false;
    }

    public function handleRemainingContents(ContextInterface $context, Cursor $cursor): void
    {
=======
use League\CommonMark\Node\Block\AbstractBlock;

final class TableCell extends AbstractBlock
{
    public const TYPE_HEADER = 'header';
    public const TYPE_DATA   = 'data';

    public const ALIGN_LEFT   = 'left';
    public const ALIGN_RIGHT  = 'right';
    public const ALIGN_CENTER = 'center';

    /**
     * @psalm-var self::TYPE_*
     * @phpstan-var self::TYPE_*
     *
     * @psalm-readonly-allow-private-mutation
     */
    private string $type = self::TYPE_DATA;

    /**
     * @psalm-var self::ALIGN_*|null
     * @phpstan-var self::ALIGN_*|null
     *
     * @psalm-readonly-allow-private-mutation
     */
    private ?string $align = null;

    /**
     * @psalm-param self::TYPE_* $type
     * @psalm-param self::ALIGN_*|null $align
     *
     * @phpstan-param self::TYPE_* $type
     * @phpstan-param self::ALIGN_*|null $align
     */
    public function __construct(string $type = self::TYPE_DATA, ?string $align = null)
    {
        parent::__construct();

        $this->type  = $type;
        $this->align = $align;
    }

    /**
     * @psalm-return self::TYPE_*
     *
     * @phpstan-return self::TYPE_*
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @psalm-param self::TYPE_* $type
     *
     * @phpstan-param self::TYPE_* $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @psalm-return self::ALIGN_*|null
     *
     * @phpstan-return self::ALIGN_*|null
     */
    public function getAlign(): ?string
    {
        return $this->align;
    }

    /**
     * @psalm-param self::ALIGN_*|null $align
     *
     * @phpstan-param self::ALIGN_*|null $align
     */
    public function setAlign(?string $align): void
    {
        $this->align = $align;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
