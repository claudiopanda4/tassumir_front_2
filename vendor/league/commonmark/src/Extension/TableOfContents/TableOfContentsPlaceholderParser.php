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

namespace League\CommonMark\Extension\TableOfContents;

<<<<<<< HEAD
use League\CommonMark\Block\Parser\BlockParserInterface;
use League\CommonMark\ContextInterface;
use League\CommonMark\Cursor;
use League\CommonMark\Extension\TableOfContents\Node\TableOfContentsPlaceholder;
use League\CommonMark\Util\ConfigurationAwareInterface;
use League\CommonMark\Util\ConfigurationInterface;

final class TableOfContentsPlaceholderParser implements BlockParserInterface, ConfigurationAwareInterface
{
    /** @var ConfigurationInterface */
    private $config;

    public function parse(ContextInterface $context, Cursor $cursor): bool
    {
        $placeholder = $this->config->get('table_of_contents/placeholder');
        if ($placeholder === null) {
            return false;
        }

        // The placeholder must be the only thing on the line
        if ($cursor->match('/^' . \preg_quote($placeholder, '/') . '$/') === null) {
            return false;
        }

        $context->addBlock(new TableOfContentsPlaceholder());

        return true;
    }

    public function setConfiguration(ConfigurationInterface $configuration)
    {
        $this->config = $configuration;
=======
use League\CommonMark\Extension\TableOfContents\Node\TableOfContentsPlaceholder;
use League\CommonMark\Parser\Block\AbstractBlockContinueParser;
use League\CommonMark\Parser\Block\BlockContinue;
use League\CommonMark\Parser\Block\BlockContinueParserInterface;
use League\CommonMark\Parser\Block\BlockStart;
use League\CommonMark\Parser\Block\BlockStartParserInterface;
use League\CommonMark\Parser\Cursor;
use League\CommonMark\Parser\MarkdownParserStateInterface;
use League\Config\ConfigurationAwareInterface;
use League\Config\ConfigurationInterface;

final class TableOfContentsPlaceholderParser extends AbstractBlockContinueParser
{
    /** @psalm-readonly */
    private TableOfContentsPlaceholder $block;

    public function __construct()
    {
        $this->block = new TableOfContentsPlaceholder();
    }

    public function getBlock(): TableOfContentsPlaceholder
    {
        return $this->block;
    }

    public function tryContinue(Cursor $cursor, BlockContinueParserInterface $activeBlockParser): ?BlockContinue
    {
        return BlockContinue::none();
    }

    public static function blockStartParser(): BlockStartParserInterface
    {
        return new class () implements BlockStartParserInterface, ConfigurationAwareInterface {
            /** @psalm-readonly-allow-private-mutation */
            private ConfigurationInterface $config;

            public function tryStart(Cursor $cursor, MarkdownParserStateInterface $parserState): ?BlockStart
            {
                $placeholder = $this->config->get('table_of_contents/placeholder');
                if ($placeholder === null) {
                    return BlockStart::none();
                }

                // The placeholder must be the only thing on the line
                if ($cursor->match('/^' . \preg_quote($placeholder, '/') . '$/') === null) {
                    return BlockStart::none();
                }

                return BlockStart::of(new TableOfContentsPlaceholderParser())->at($cursor);
            }

            public function setConfiguration(ConfigurationInterface $configuration): void
            {
                $this->config = $configuration;
            }
        };
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
