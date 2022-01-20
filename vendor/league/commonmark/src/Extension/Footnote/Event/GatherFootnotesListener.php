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

namespace League\CommonMark\Extension\Footnote\Event;

<<<<<<< HEAD
use League\CommonMark\Block\Element\Document;
=======
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\Footnote\Node\Footnote;
use League\CommonMark\Extension\Footnote\Node\FootnoteBackref;
use League\CommonMark\Extension\Footnote\Node\FootnoteContainer;
<<<<<<< HEAD
use League\CommonMark\Reference\Reference;
use League\CommonMark\Util\ConfigurationAwareInterface;
use League\CommonMark\Util\ConfigurationInterface;

final class GatherFootnotesListener implements ConfigurationAwareInterface
{
    /** @var ConfigurationInterface */
    private $config;

    public function onDocumentParsed(DocumentParsedEvent $event): void
    {
        $document = $event->getDocument();
        $walker = $document->walker();

        $footnotes = [];
        while ($event = $walker->next()) {
            if (!$event->isEntering()) {
                continue;
            }

            $node = $event->getNode();
            if (!$node instanceof Footnote) {
=======
use League\CommonMark\Node\Block\Document;
use League\CommonMark\Node\NodeIterator;
use League\CommonMark\Reference\Reference;
use League\Config\ConfigurationAwareInterface;
use League\Config\ConfigurationInterface;

final class GatherFootnotesListener implements ConfigurationAwareInterface
{
    private ConfigurationInterface $config;

    public function onDocumentParsed(DocumentParsedEvent $event): void
    {
        $document  = $event->getDocument();
        $footnotes = [];

        foreach ($document->iterator(NodeIterator::FLAG_BLOCKS_ONLY) as $node) {
            if (! $node instanceof Footnote) {
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
                continue;
            }

            // Look for existing reference with footnote label
<<<<<<< HEAD
            $ref = $document->getReferenceMap()->getReference($node->getReference()->getLabel());
            if ($ref !== null) {
                // Use numeric title to get footnotes order
                $footnotes[\intval($ref->getTitle())] = $node;
            } else {
                // Footnote call is missing, append footnote at the end
                $footnotes[INF] = $node;
            }

            /*
             * Look for all footnote refs pointing to this footnote
             * and create each footnote backrefs.
             */
            $backrefs = $document->getData(
                '#' . $this->config->get('footnote/footnote_id_prefix', 'fn:') . $node->getReference()->getDestination(),
                []
            );
            /** @var Reference $backref */
            foreach ($backrefs as $backref) {
                $node->addBackref(new FootnoteBackref(new Reference(
                    $backref->getLabel(),
                    '#' . $this->config->get('footnote/ref_id_prefix', 'fnref:') . $backref->getLabel(),
                    $backref->getTitle()
                )));
=======
            $ref = $document->getReferenceMap()->get($node->getReference()->getLabel());
            if ($ref !== null) {
                // Use numeric title to get footnotes order
                $footnotes[(int) $ref->getTitle()] = $node;
            } else {
                // Footnote call is missing, append footnote at the end
                $footnotes[\PHP_INT_MAX] = $node;
            }

            $key = '#' . $this->config->get('footnote/footnote_id_prefix') . $node->getReference()->getDestination();
            if ($document->data->has($key)) {
                $this->createBackrefs($node, $document->data->get($key));
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            }
        }

        // Only add a footnote container if there are any
        if (\count($footnotes) === 0) {
            return;
        }

        $container = $this->getFootnotesContainer($document);

        \ksort($footnotes);
        foreach ($footnotes as $footnote) {
            $container->appendChild($footnote);
        }
    }

    private function getFootnotesContainer(Document $document): FootnoteContainer
    {
        $footnoteContainer = new FootnoteContainer();
        $document->appendChild($footnoteContainer);

        return $footnoteContainer;
    }

<<<<<<< HEAD
    public function setConfiguration(ConfigurationInterface $config): void
    {
        $this->config = $config;
=======
    /**
     * Look for all footnote refs pointing to this footnote and create each footnote backrefs.
     *
     * @param Footnote    $node     The target footnote
     * @param Reference[] $backrefs References to create backrefs for
     */
    private function createBackrefs(Footnote $node, array $backrefs): void
    {
        // Backrefs should be added to the child paragraph
        $target = $node->lastChild();
        if ($target === null) {
            // This should never happen, but you never know
            $target = $node;
        }

        foreach ($backrefs as $backref) {
            $target->appendChild(new FootnoteBackref(new Reference(
                $backref->getLabel(),
                '#' . $this->config->get('footnote/ref_id_prefix') . $backref->getLabel(),
                $backref->getTitle()
            )));
        }
    }

    public function setConfiguration(ConfigurationInterface $configuration): void
    {
        $this->config = $configuration;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
