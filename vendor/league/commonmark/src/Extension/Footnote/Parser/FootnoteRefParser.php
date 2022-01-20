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

namespace League\CommonMark\Extension\Footnote\Parser;

use League\CommonMark\Extension\Footnote\Node\FootnoteRef;
<<<<<<< HEAD
use League\CommonMark\Inline\Parser\InlineParserInterface;
use League\CommonMark\InlineParserContext;
use League\CommonMark\Reference\Reference;
use League\CommonMark\Util\ConfigurationAwareInterface;
use League\CommonMark\Util\ConfigurationInterface;

final class FootnoteRefParser implements InlineParserInterface, ConfigurationAwareInterface
{
    /** @var ConfigurationInterface */
    private $config;

    public function getCharacters(): array
    {
        return ['['];
=======
use League\CommonMark\Parser\Inline\InlineParserInterface;
use League\CommonMark\Parser\Inline\InlineParserMatch;
use League\CommonMark\Parser\InlineParserContext;
use League\CommonMark\Reference\Reference;
use League\Config\ConfigurationAwareInterface;
use League\Config\ConfigurationInterface;

final class FootnoteRefParser implements InlineParserInterface, ConfigurationAwareInterface
{
    private ConfigurationInterface $config;

    public function getMatchDefinition(): InlineParserMatch
    {
        return InlineParserMatch::regex('\[\^([^\s\]]+)\]');
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }

    public function parse(InlineParserContext $inlineContext): bool
    {
<<<<<<< HEAD
        $container = $inlineContext->getContainer();
        $cursor = $inlineContext->getCursor();
        $nextChar = $cursor->peek();
        if ($nextChar !== '^') {
            return false;
        }

        $state = $cursor->saveState();

        $m = $cursor->match('#\[\^([^\]]+)\]#');
        if ($m !== null) {
            if (\preg_match('#\[\^([^\]]+)\]#', $m, $matches) > 0) {
                $container->appendChild(new FootnoteRef($this->createReference($matches[1])));

                return true;
            }
        }

        $cursor->restoreState($state);

        return false;
=======
        $inlineContext->getCursor()->advanceBy($inlineContext->getFullMatchLength());

        [$label] = $inlineContext->getSubMatches();
        $inlineContext->getContainer()->appendChild(new FootnoteRef($this->createReference($label)));

        return true;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }

    private function createReference(string $label): Reference
    {
        return new Reference(
            $label,
<<<<<<< HEAD
            '#' . $this->config->get('footnote/footnote_id_prefix', 'fn:') . $label,
=======
            '#' . $this->config->get('footnote/footnote_id_prefix') . $label,
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            $label
        );
    }

<<<<<<< HEAD
    public function setConfiguration(ConfigurationInterface $config): void
    {
        $this->config = $config;
=======
    public function setConfiguration(ConfigurationInterface $configuration): void
    {
        $this->config = $configuration;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
