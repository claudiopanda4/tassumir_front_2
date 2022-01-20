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

use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\Footnote\Node\FootnoteRef;
use League\CommonMark\Reference\Reference;

final class NumberFootnotesListener
{
    public function onDocumentParsed(DocumentParsedEvent $event): void
    {
<<<<<<< HEAD
        $document = $event->getDocument();
        $walker = $document->walker();
        $nextCounter = 1;
        $usedLabels = [];
        $usedCounters = [];

        while ($event = $walker->next()) {
            if (!$event->isEntering()) {
                continue;
            }

            $node = $event->getNode();

            if (!$node instanceof FootnoteRef) {
                continue;
            }

            $existingReference = $node->getReference();
            $label = $existingReference->getLabel();
            $counter = $nextCounter;
=======
        $document     = $event->getDocument();
        $nextCounter  = 1;
        $usedLabels   = [];
        $usedCounters = [];

        foreach ($document->iterator() as $node) {
            if (! $node instanceof FootnoteRef) {
                continue;
            }

            $existingReference   = $node->getReference();
            $label               = $existingReference->getLabel();
            $counter             = $nextCounter;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            $canIncrementCounter = true;

            if (\array_key_exists($label, $usedLabels)) {
                /*
                 * Reference is used again, we need to point
                 * to the same footnote. But with a different ID
                 */
<<<<<<< HEAD
                $counter = $usedCounters[$label];
                $label = $label . '__' . ++$usedLabels[$label];
=======
                $counter             = $usedCounters[$label];
                $label              .= '__' . ++$usedLabels[$label];
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
                $canIncrementCounter = false;
            }

            // rewrite reference title to use a numeric link
            $newReference = new Reference(
                $label,
                $existingReference->getDestination(),
                (string) $counter
            );

            // Override reference with numeric link
            $node->setReference($newReference);
<<<<<<< HEAD
            $document->getReferenceMap()->addReference($newReference);
=======
            $document->getReferenceMap()->add($newReference);
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

            /*
             * Store created references in document for
             * creating FootnoteBackrefs
             */
<<<<<<< HEAD
            if (false === $document->getData($existingReference->getDestination(), false)) {
                $document->data[$existingReference->getDestination()] = [];
            }

            $document->data[$existingReference->getDestination()][] = $newReference;

            $usedLabels[$label] = 1;
=======
            $document->data->append($existingReference->getDestination(), $newReference);

            $usedLabels[$label]   = 1;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            $usedCounters[$label] = $nextCounter;

            if ($canIncrementCounter) {
                $nextCounter++;
            }
        }
    }
}
