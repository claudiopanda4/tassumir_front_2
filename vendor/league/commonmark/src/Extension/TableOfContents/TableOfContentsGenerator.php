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
use League\CommonMark\Block\Element\Document;
use League\CommonMark\Block\Element\Heading;
use League\CommonMark\Block\Element\ListBlock;
use League\CommonMark\Block\Element\ListData;
use League\CommonMark\Block\Element\ListItem;
use League\CommonMark\Block\Element\Paragraph;
use League\CommonMark\Exception\InvalidOptionException;
=======
use League\CommonMark\Extension\CommonMark\Node\Block\Heading;
use League\CommonMark\Extension\CommonMark\Node\Block\ListBlock;
use League\CommonMark\Extension\CommonMark\Node\Block\ListData;
use League\CommonMark\Extension\CommonMark\Node\Block\ListItem;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalink;
use League\CommonMark\Extension\TableOfContents\Node\TableOfContents;
use League\CommonMark\Extension\TableOfContents\Normalizer\AsIsNormalizerStrategy;
use League\CommonMark\Extension\TableOfContents\Normalizer\FlatNormalizerStrategy;
use League\CommonMark\Extension\TableOfContents\Normalizer\NormalizerStrategyInterface;
use League\CommonMark\Extension\TableOfContents\Normalizer\RelativeNormalizerStrategy;
<<<<<<< HEAD
use League\CommonMark\Inline\Element\AbstractStringContainer;
use League\CommonMark\Inline\Element\Link;

final class TableOfContentsGenerator implements TableOfContentsGeneratorInterface
{
    public const STYLE_BULLET = ListBlock::TYPE_BULLET;
=======
use League\CommonMark\Node\Block\Document;
use League\CommonMark\Node\NodeIterator;
use League\CommonMark\Node\RawMarkupContainerInterface;
use League\CommonMark\Node\StringContainerHelper;
use League\Config\Exception\InvalidConfigurationException;

final class TableOfContentsGenerator implements TableOfContentsGeneratorInterface
{
    public const STYLE_BULLET  = ListBlock::TYPE_BULLET;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    public const STYLE_ORDERED = ListBlock::TYPE_ORDERED;

    public const NORMALIZE_DISABLED = 'as-is';
    public const NORMALIZE_RELATIVE = 'relative';
<<<<<<< HEAD
    public const NORMALIZE_FLAT = 'flat';

    /** @var string */
    private $style;
    /** @var string */
    private $normalizationStrategy;
    /** @var int */
    private $minHeadingLevel;
    /** @var int */
    private $maxHeadingLevel;

    public function __construct(string $style, string $normalizationStrategy, int $minHeadingLevel, int $maxHeadingLevel)
    {
        $this->style = $style;
        $this->normalizationStrategy = $normalizationStrategy;
        $this->minHeadingLevel = $minHeadingLevel;
        $this->maxHeadingLevel = $maxHeadingLevel;
=======
    public const NORMALIZE_FLAT     = 'flat';

    /** @psalm-readonly */
    private string $style;

    /** @psalm-readonly */
    private string $normalizationStrategy;

    /** @psalm-readonly */
    private int $minHeadingLevel;

    /** @psalm-readonly */
    private int $maxHeadingLevel;

    /** @psalm-readonly */
    private string $fragmentPrefix;

    public function __construct(string $style, string $normalizationStrategy, int $minHeadingLevel, int $maxHeadingLevel, string $fragmentPrefix)
    {
        $this->style                 = $style;
        $this->normalizationStrategy = $normalizationStrategy;
        $this->minHeadingLevel       = $minHeadingLevel;
        $this->maxHeadingLevel       = $maxHeadingLevel;
        $this->fragmentPrefix        = $fragmentPrefix;

        if ($fragmentPrefix !== '') {
            $this->fragmentPrefix .= '-';
        }
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }

    public function generate(Document $document): ?TableOfContents
    {
        $toc = $this->createToc($document);

        $normalizer = $this->getNormalizer($toc);

        $firstHeading = null;

        foreach ($this->getHeadingLinks($document) as $headingLink) {
            $heading = $headingLink->parent();
            // Make sure this is actually tied to a heading
<<<<<<< HEAD
            if (!$heading instanceof Heading) {
=======
            if (! $heading instanceof Heading) {
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
                continue;
            }

            // Skip any headings outside the configured min/max levels
            if ($heading->getLevel() < $this->minHeadingLevel || $heading->getLevel() > $this->maxHeadingLevel) {
                continue;
            }

            // Keep track of the first heading we see - we might need this later
<<<<<<< HEAD
            $firstHeading = $firstHeading ?? $heading;
=======
            $firstHeading ??= $heading;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

            // Keep track of the start and end lines
            $toc->setStartLine($firstHeading->getStartLine());
            $toc->setEndLine($heading->getEndLine());

            // Create the new link
<<<<<<< HEAD
            $link = new Link('#' . $headingLink->getSlug(), self::getHeadingText($heading));
            $paragraph = new Paragraph();
            $paragraph->setStartLine($heading->getStartLine());
            $paragraph->setEndLine($heading->getEndLine());
            $paragraph->appendChild($link);
=======
            $link = new Link('#' . $this->fragmentPrefix . $headingLink->getSlug(), StringContainerHelper::getChildText($heading, [RawMarkupContainerInterface::class]));
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

            $listItem = new ListItem($toc->getListData());
            $listItem->setStartLine($heading->getStartLine());
            $listItem->setEndLine($heading->getEndLine());
<<<<<<< HEAD
            $listItem->appendChild($paragraph);
=======
            $listItem->appendChild($link);
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

            // Add it to the correct place
            $normalizer->addItem($heading->getLevel(), $listItem);
        }

        // Don't add the TOC if no headings were present
<<<<<<< HEAD
        if (!$toc->hasChildren() || $firstHeading === null) {
=======
        if (! $toc->hasChildren() || $firstHeading === null) {
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            return null;
        }

        return $toc;
    }

    private function createToc(Document $document): TableOfContents
    {
        $listData = new ListData();

        if ($this->style === self::STYLE_BULLET) {
            $listData->type = ListBlock::TYPE_BULLET;
        } elseif ($this->style === self::STYLE_ORDERED) {
            $listData->type = ListBlock::TYPE_ORDERED;
        } else {
<<<<<<< HEAD
            throw new InvalidOptionException(\sprintf('Invalid table of contents list style "%s"', $this->style));
=======
            throw new InvalidConfigurationException(\sprintf('Invalid table of contents list style: "%s"', $this->style));
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        }

        $toc = new TableOfContents($listData);

        $toc->setStartLine($document->getStartLine());
        $toc->setEndLine($document->getEndLine());

        return $toc;
    }

    /**
<<<<<<< HEAD
     * @param Document $document
     *
     * @return iterable<HeadingPermalink>
     */
    private function getHeadingLinks(Document $document)
    {
        $walker = $document->walker();
        while ($event = $walker->next()) {
            if ($event->isEntering() && ($node = $event->getNode()) instanceof HeadingPermalink) {
                yield $node;
=======
     * @return iterable<HeadingPermalink>
     */
    private function getHeadingLinks(Document $document): iterable
    {
        foreach ($document->iterator(NodeIterator::FLAG_BLOCKS_ONLY) as $node) {
            if (! $node instanceof Heading) {
                continue;
            }

            foreach ($node->children() as $child) {
                if ($child instanceof HeadingPermalink) {
                    yield $child;
                }
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            }
        }
    }

    private function getNormalizer(TableOfContents $toc): NormalizerStrategyInterface
    {
        switch ($this->normalizationStrategy) {
            case self::NORMALIZE_DISABLED:
                return new AsIsNormalizerStrategy($toc);
            case self::NORMALIZE_RELATIVE:
                return new RelativeNormalizerStrategy($toc);
            case self::NORMALIZE_FLAT:
                return new FlatNormalizerStrategy($toc);
            default:
<<<<<<< HEAD
                throw new InvalidOptionException(\sprintf('Invalid table of contents normalization strategy "%s"', $this->normalizationStrategy));
        }
    }

    /**
     * @return string
     */
    private static function getHeadingText(Heading $heading)
    {
        $text = '';

        $walker = $heading->walker();
        while ($event = $walker->next()) {
            if ($event->isEntering() && ($child = $event->getNode()) instanceof AbstractStringContainer) {
                $text .= $child->getContent();
            }
        }

        return $text;
=======
                throw new InvalidConfigurationException(\sprintf('Invalid table of contents normalization strategy: "%s"', $this->normalizationStrategy));
        }
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
