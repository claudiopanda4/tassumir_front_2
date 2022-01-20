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
 * Original code based on the CommonMark JS reference parser (http://bitly.com/commonmark-js)
 *  - (c) John MacFarlane
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Extension\SmartPunct;

use League\CommonMark\Delimiter\Delimiter;
<<<<<<< HEAD
use League\CommonMark\Inline\Parser\InlineParserInterface;
use League\CommonMark\InlineParserContext;
=======
use League\CommonMark\Parser\Inline\InlineParserInterface;
use League\CommonMark\Parser\Inline\InlineParserMatch;
use League\CommonMark\Parser\InlineParserContext;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
use League\CommonMark\Util\RegexHelper;

final class QuoteParser implements InlineParserInterface
{
    public const DOUBLE_QUOTES = [Quote::DOUBLE_QUOTE, Quote::DOUBLE_QUOTE_OPENER, Quote::DOUBLE_QUOTE_CLOSER];
    public const SINGLE_QUOTES = [Quote::SINGLE_QUOTE, Quote::SINGLE_QUOTE_OPENER, Quote::SINGLE_QUOTE_CLOSER];

<<<<<<< HEAD
    /**
     * @return string[]
     */
    public function getCharacters(): array
    {
        return array_merge(self::DOUBLE_QUOTES, self::SINGLE_QUOTES);
=======
    public function getMatchDefinition(): InlineParserMatch
    {
        return InlineParserMatch::oneOf(...\array_merge(self::DOUBLE_QUOTES, self::SINGLE_QUOTES));
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }

    /**
     * Normalizes any quote characters found and manually adds them to the delimiter stack
     */
    public function parse(InlineParserContext $inlineContext): bool
    {
<<<<<<< HEAD
        $cursor = $inlineContext->getCursor();
        $normalizedCharacter = $this->getNormalizedQuoteCharacter($cursor->getCharacter());
=======
        $char   = $inlineContext->getFullMatch();
        $cursor = $inlineContext->getCursor();

        $normalizedCharacter = $this->getNormalizedQuoteCharacter($char);
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

        $charBefore = $cursor->peek(-1);
        if ($charBefore === null) {
            $charBefore = "\n";
        }

        $cursor->advance();

<<<<<<< HEAD
        $charAfter = $cursor->getCharacter();
=======
        $charAfter = $cursor->getCurrentCharacter();
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        if ($charAfter === null) {
            $charAfter = "\n";
        }

        [$leftFlanking, $rightFlanking] = $this->determineFlanking($charBefore, $charAfter);
<<<<<<< HEAD
        $canOpen = $leftFlanking && !$rightFlanking;
        $canClose = $rightFlanking;
=======
        $canOpen                        = $leftFlanking && ! $rightFlanking;
        $canClose                       = $rightFlanking;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

        $node = new Quote($normalizedCharacter, ['delim' => true]);
        $inlineContext->getContainer()->appendChild($node);

        // Add entry to stack to this opener
        $inlineContext->getDelimiterStack()->push(new Delimiter($normalizedCharacter, 1, $node, $canOpen, $canClose));

        return true;
    }

    private function getNormalizedQuoteCharacter(string $character): string
    {
<<<<<<< HEAD
        if (in_array($character, self::DOUBLE_QUOTES)) {
            return Quote::DOUBLE_QUOTE;
        } elseif (in_array($character, self::SINGLE_QUOTES)) {
=======
        if (\in_array($character, self::DOUBLE_QUOTES, true)) {
            return Quote::DOUBLE_QUOTE;
        }

        if (\in_array($character, self::SINGLE_QUOTES, true)) {
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            return Quote::SINGLE_QUOTE;
        }

        return $character;
    }

    /**
<<<<<<< HEAD
     * @param string $charBefore
     * @param string $charAfter
     *
     * @return bool[]
     */
    private function determineFlanking(string $charBefore, string $charAfter)
    {
        $afterIsWhitespace = preg_match('/\pZ|\s/u', $charAfter);
        $afterIsPunctuation = preg_match(RegexHelper::REGEX_PUNCTUATION, $charAfter);
        $beforeIsWhitespace = preg_match('/\pZ|\s/u', $charBefore);
        $beforeIsPunctuation = preg_match(RegexHelper::REGEX_PUNCTUATION, $charBefore);

        $leftFlanking = !$afterIsWhitespace &&
            !($afterIsPunctuation &&
                !$beforeIsWhitespace &&
                !$beforeIsPunctuation);

        $rightFlanking = !$beforeIsWhitespace &&
            !($beforeIsPunctuation &&
                !$afterIsWhitespace &&
                !$afterIsPunctuation);
=======
     * @return bool[]
     */
    private function determineFlanking(string $charBefore, string $charAfter): array
    {
        $afterIsWhitespace   = \preg_match('/\pZ|\s/u', $charAfter);
        $afterIsPunctuation  = \preg_match(RegexHelper::REGEX_PUNCTUATION, $charAfter);
        $beforeIsWhitespace  = \preg_match('/\pZ|\s/u', $charBefore);
        $beforeIsPunctuation = \preg_match(RegexHelper::REGEX_PUNCTUATION, $charBefore);

        $leftFlanking = ! $afterIsWhitespace &&
            ! ($afterIsPunctuation &&
                ! $beforeIsWhitespace &&
                ! $beforeIsPunctuation);

        $rightFlanking = ! $beforeIsWhitespace &&
            ! ($beforeIsPunctuation &&
                ! $afterIsWhitespace &&
                ! $afterIsPunctuation);
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

        return [$leftFlanking, $rightFlanking];
    }
}
