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

namespace League\CommonMark\Event;

<<<<<<< HEAD
use League\CommonMark\Block\Element\Document;
=======
use League\CommonMark\Node\Block\Document;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

/**
 * Event dispatched when the document has been fully parsed
 */
final class DocumentParsedEvent extends AbstractEvent
{
<<<<<<< HEAD
    /** @var Document */
    private $document;
=======
    /** @psalm-readonly */
    private Document $document;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

    public function __construct(Document $document)
    {
        $this->document = $document;
    }

    public function getDocument(): Document
    {
        return $this->document;
    }
}
