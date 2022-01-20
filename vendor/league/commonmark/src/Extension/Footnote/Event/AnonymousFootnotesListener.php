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
use League\CommonMark\Block\Element\Paragraph;
=======
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\Footnote\Node\Footnote;
use League\CommonMark\Extension\Footnote\Node\FootnoteBackref;
use League\CommonMark\Extension\Footnote\Node\FootnoteRef;
<<<<<<< HEAD
use League\CommonMark\Inline\Element\Text;
use League\CommonMark\Reference\Reference;
use League\CommonMark\Util\ConfigurationAwareInterface;
use League\CommonMark\Util\ConfigurationInterface;

final class AnonymousFootnotesListener implements ConfigurationAwareInterface
{
    /** @var ConfigurationInterface */
    private $config;
=======
use League\CommonMark\Node\Block\Paragraph;
use League\CommonMark\Node\Inline\Text;
use League\CommonMark\Reference\Reference;
use League\Config\ConfigurationAwareInterface;
use League\Config\ConfigurationInterface;

final class AnonymousFootnotesListener implements ConfigurationAwareInterface
{
    private ConfigurationInterface $config;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

    public function onDocumentParsed(DocumentParsedEvent $event): void
    {
        $document = $event->getDocument();
<<<<<<< HEAD
        $walker = $document->walker();

        while ($event = $walker->next()) {
            $node = $event->getNode();
            if ($node instanceof FootnoteRef && $event->isEntering() && null !== $text = $node->getContent()) {
                // Anonymous footnote needs to create a footnote from its content
                $existingReference = $node->getReference();
                $reference = new Reference(
                    $existingReference->getLabel(),
                    '#' . $this->config->get('footnote/ref_id_prefix', 'fnref:') . $existingReference->getLabel(),
                    $existingReference->getTitle()
                );
                $footnote = new Footnote($reference);
                $footnote->addBackref(new FootnoteBackref($reference));
                $paragraph = new Paragraph();
                $paragraph->appendChild(new Text($text));
                $footnote->appendChild($paragraph);
                $document->appendChild($footnote);
            }
        }
    }

    public function setConfiguration(ConfigurationInterface $config): void
    {
        $this->config = $config;
=======
        foreach ($document->iterator() as $node) {
            if (! $node instanceof FootnoteRef || ($text = $node->getContent()) === null) {
                continue;
            }

            // Anonymous footnote needs to create a footnote from its content
            $existingReference = $node->getReference();
            $newReference      = new Reference(
                $existingReference->getLabel(),
                '#' . $this->config->get('footnote/ref_id_prefix') . $existingReference->getLabel(),
                $existingReference->getTitle()
            );

            $paragraph = new Paragraph();
            $paragraph->appendChild(new Text($text));
            $paragraph->appendChild(new FootnoteBackref($newReference));

            $footnote = new Footnote($newReference);
            $footnote->appendChild($paragraph);

            $document->appendChild($footnote);
        }
    }

    public function setConfiguration(ConfigurationInterface $configuration): void
    {
        $this->config = $configuration;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
