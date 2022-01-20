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

namespace League\CommonMark\Extension\Mention;

use League\CommonMark\Extension\Mention\Generator\CallbackGenerator;
use League\CommonMark\Extension\Mention\Generator\MentionGeneratorInterface;
use League\CommonMark\Extension\Mention\Generator\StringTemplateLinkGenerator;
<<<<<<< HEAD
use League\CommonMark\Inline\Parser\InlineParserInterface;
use League\CommonMark\InlineParserContext;

final class MentionParser implements InlineParserInterface
{
    /** @var string */
    private $symbol;

    /** @var string */
    private $mentionRegex;

    /** @var MentionGeneratorInterface */
    private $mentionGenerator;

    public function __construct(string $symbol, string $mentionRegex, MentionGeneratorInterface $mentionGenerator)
    {
        $this->symbol = $symbol;
        $this->mentionRegex = $mentionRegex;
        $this->mentionGenerator = $mentionGenerator;
    }

    public function getCharacters(): array
    {
        return [$this->symbol];
=======
use League\CommonMark\Parser\Inline\InlineParserInterface;
use League\CommonMark\Parser\Inline\InlineParserMatch;
use League\CommonMark\Parser\InlineParserContext;

final class MentionParser implements InlineParserInterface
{
    /** @psalm-readonly */
    private string $name;

    /** @psalm-readonly */
    private string $prefix;

    /** @psalm-readonly */
    private string $identifierPattern;

    /** @psalm-readonly */
    private MentionGeneratorInterface $mentionGenerator;

    public function __construct(string $name, string $prefix, string $identifierPattern, MentionGeneratorInterface $mentionGenerator)
    {
        $this->name              = $name;
        $this->prefix            = $prefix;
        $this->identifierPattern = $identifierPattern;
        $this->mentionGenerator  = $mentionGenerator;
    }

    public function getMatchDefinition(): InlineParserMatch
    {
        return InlineParserMatch::join(
            InlineParserMatch::string($this->prefix),
            InlineParserMatch::regex($this->identifierPattern)
        );
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }

    public function parse(InlineParserContext $inlineContext): bool
    {
        $cursor = $inlineContext->getCursor();

<<<<<<< HEAD
        // The symbol must not have any other characters immediately prior
=======
        // The prefix must not have any other characters immediately prior
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        $previousChar = $cursor->peek(-1);
        if ($previousChar !== null && \preg_match('/\w/', $previousChar)) {
            // peek() doesn't modify the cursor, so no need to restore state first
            return false;
        }

<<<<<<< HEAD
        // Save the cursor state in case we need to rewind and bail
        $previousState = $cursor->saveState();

        // Advance past the symbol to keep parsing simpler
        $cursor->advance();

        // Parse the mention match value
        $identifier = $cursor->match($this->mentionRegex);
        if ($identifier === null) {
            // Regex failed to match; this isn't a valid mention
            $cursor->restoreState($previousState);

            return false;
        }

        $mention = $this->mentionGenerator->generateMention(new Mention($this->symbol, $identifier));

        if ($mention === null) {
            $cursor->restoreState($previousState);

            return false;
        }

=======
        [$prefix, $identifier] = $inlineContext->getSubMatches();

        $mention = $this->mentionGenerator->generateMention(new Mention($this->name, $prefix, $identifier));

        if ($mention === null) {
            return false;
        }

        $cursor->advanceBy($inlineContext->getFullMatchLength());
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        $inlineContext->getContainer()->appendChild($mention);

        return true;
    }

<<<<<<< HEAD
    public static function createWithStringTemplate(string $symbol, string $mentionRegex, string $urlTemplate): MentionParser
    {
        return new self($symbol, $mentionRegex, new StringTemplateLinkGenerator($urlTemplate));
    }

    public static function createWithCallback(string $symbol, string $mentionRegex, callable $callback): MentionParser
    {
        return new self($symbol, $mentionRegex, new CallbackGenerator($callback));
=======
    public static function createWithStringTemplate(string $name, string $prefix, string $mentionRegex, string $urlTemplate): MentionParser
    {
        return new self($name, $prefix, $mentionRegex, new StringTemplateLinkGenerator($urlTemplate));
    }

    public static function createWithCallback(string $name, string $prefix, string $mentionRegex, callable $callback): MentionParser
    {
        return new self($name, $prefix, $mentionRegex, new CallbackGenerator($callback));
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
