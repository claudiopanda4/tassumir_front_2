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

final class TableSection extends AbstractStringContainerBlock implements InlineContainerInterface
{
    const TYPE_HEAD = 'thead';
    const TYPE_BODY = 'tbody';

    /** @var string */
    public $type = self::TYPE_BODY;

    public function __construct(string $type = self::TYPE_BODY)
    {
        parent::__construct();
        $this->type = $type;
    }

    public function isHead(): bool
    {
        return self::TYPE_HEAD === $this->type;
    }

    public function isBody(): bool
    {
        return self::TYPE_BODY === $this->type;
    }

    public function canContain(AbstractBlock $block): bool
    {
        return $block instanceof TableRow;
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

final class TableSection extends AbstractBlock
{
    public const TYPE_HEAD = 'head';
    public const TYPE_BODY = 'body';

    /**
     * @psalm-var self::TYPE_*
     * @phpstan-var self::TYPE_*
     *
     * @psalm-readonly
     */
    private string $type;

    /**
     * @psalm-param self::TYPE_* $type
     *
     * @phpstan-param self::TYPE_* $type
     */
    public function __construct(string $type = self::TYPE_BODY)
    {
        parent::__construct();

        $this->type = $type;
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

    public function isHead(): bool
    {
        return $this->type === self::TYPE_HEAD;
    }

    public function isBody(): bool
    {
        return $this->type === self::TYPE_BODY;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
