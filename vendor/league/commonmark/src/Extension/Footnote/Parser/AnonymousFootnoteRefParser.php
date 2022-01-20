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

<<<<<<< HEAD
use League\CommonMark\Extension\Footnote\Node\FootnoteRef;
use League\CommonMark\Inline\Parser\InlineParserInterface;
use League\CommonMark\InlineParserContext;
use League\CommonMark\Normalizer\SlugNormalizer;
use League\CommonMark\Normalizer\TextNormalizerInterface;
use League\CommonMark\Reference\Reference;
use League\CommonMark\Util\ConfigurationAwareInterface;
use League\CommonMark\Util\ConfigurationInterface;

final class AnonymousFootnoteRefParser implements InlineParserInterface, ConfigurationAwareInterface
{
    /** @var ConfigurationInterface */
    private $config;

    /** @var TextNormalizerInterface */
    private $slugNormalizer;

    public function __construct()
    {
        $this->slugNormalizer = new SlugNormalizer();
    }

    public function getCharacters(): array
    {
        return ['^'];
=======
use League\CommonMark\Environment\EnvironmentAwareInterface;
use League\CommonMark\Environment\EnvironmentInterface;
use League\CommonMark\Extension\Footnote\Node\FootnoteRef;
use League\CommonMark\Normalizer\TextNormalizerInterface;
use League\CommonMark\Parser\Inline\InlineParserInterface;
use League\CommonMark\Parser\Inline\InlineParserMatch;
use League\CommonMark\Parser\InlineParserContext;
use League\CommonMark\Reference\Reference;
use League\Config\ConfigurationInterface;

final class AnonymousFootnoteRefParser implements InlineParserInterface, EnvironmentAwareInterface
{
    private ConfigurationInterface $config;

    /** @psalm-readonly-allow-private-mutation */
    private TextNormalizerInterface $slugNormalizer;

    public function getMatchDefinition(): InlineParserMatch
    {
        return InlineParserMatch::regex('\^\[([^\]]+)\]');
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }

    public function parse(InlineParserContext $inlineContext): bool
    {
<<<<<<< HEAD
        $container = $inlineContext->getContainer();
        $cursor = $inlineContext->getCursor();
        $nextChar = $cursor->peek();
        if ($nextChar !== '[') {
            return false;
        }
        $state = $cursor->saveState();

        $m = $cursor->match('/\^\[[^\n^\]]+\]/');
        if ($m !== null) {
            if (\preg_match('#\^\[([^\]]+)\]#', $m, $matches) > 0) {
                $reference = $this->createReference($matches[1]);
                $container->appendChild(new FootnoteRef($reference, $matches[1]));

                return true;
            }
        }

        $cursor->restoreState($state);

        return false;
=======
        $inlineContext->getCursor()->advanceBy($inlineContext->getFullMatchLength());

        [$label]   = $inlineContext->getSubMatches();
        $reference = $this->createReference($label);
        $inlineContext->getContainer()->appendChild(new FootnoteRef($reference, $label));

        return true;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }

    private function createReference(string $label): Reference
    {
<<<<<<< HEAD
        $refLabel = $this->slugNormalizer->normalize($label);
        $refLabel = \mb_substr($refLabel, 0, 20);

        return new Reference(
            $refLabel,
            '#' . $this->config->get('footnote/footnote_id_prefix', 'fn:') . $refLabel,
=======
        $refLabel = $this->slugNormalizer->normalize($label, ['length' => 20]);

        return new Reference(
            $refLabel,
            '#' . $this->config->get('footnote/footnote_id_prefix') . $refLabel,
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            $label
        );
    }

<<<<<<< HEAD
    public function setConfiguration(ConfigurationInterface $config): void
    {
        $this->config = $config;
=======
    public function setEnvironment(EnvironmentInterface $environment): void
    {
        $this->config         = $environment->getConfiguration();
        $this->slugNormalizer = $environment->getSlugNormalizer();
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
