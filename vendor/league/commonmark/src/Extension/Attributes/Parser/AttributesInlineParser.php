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

namespace League\CommonMark\Extension\Attributes\Parser;

use League\CommonMark\Extension\Attributes\Node\AttributesInline;
use League\CommonMark\Extension\Attributes\Util\AttributesHelper;
<<<<<<< HEAD
use League\CommonMark\Inline\Element\Text;
use League\CommonMark\Inline\Parser\InlineParserInterface;
use League\CommonMark\InlineParserContext;

final class AttributesInlineParser implements InlineParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function getCharacters(): array
    {
        return ['{'];
=======
use League\CommonMark\Node\StringContainerInterface;
use League\CommonMark\Parser\Inline\InlineParserInterface;
use League\CommonMark\Parser\Inline\InlineParserMatch;
use League\CommonMark\Parser\InlineParserContext;

final class AttributesInlineParser implements InlineParserInterface
{
    public function getMatchDefinition(): InlineParserMatch
    {
        return InlineParserMatch::string('{');
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }

    public function parse(InlineParserContext $inlineContext): bool
    {
        $cursor = $inlineContext->getCursor();
<<<<<<< HEAD

        $char = (string) $cursor->peek(-1);
=======
        $char   = (string) $cursor->peek(-1);
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

        $attributes = AttributesHelper::parseAttributes($cursor);
        if ($attributes === []) {
            return false;
        }

<<<<<<< HEAD
        if ($char === ' ' && ($previousInline = $inlineContext->getContainer()->lastChild()) instanceof Text) {
            $previousInline->setContent(\rtrim($previousInline->getContent(), ' '));
=======
        if ($char === ' ' && ($prev = $inlineContext->getContainer()->lastChild()) instanceof StringContainerInterface) {
            $prev->setLiteral(\rtrim($prev->getLiteral(), ' '));
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        }

        if ($char === '') {
            $cursor->advanceToNextNonSpaceOrNewline();
        }

        $node = new AttributesInline($attributes, $char === ' ' || $char === '');
        $inlineContext->getContainer()->appendChild($node);

        return true;
    }
}
