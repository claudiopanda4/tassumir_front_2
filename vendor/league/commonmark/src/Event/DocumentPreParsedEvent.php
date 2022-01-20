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
use League\CommonMark\Input\MarkdownInputInterface;
=======
use League\CommonMark\Input\MarkdownInputInterface;
use League\CommonMark\Node\Block\Document;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

/**
 * Event dispatched when the document is about to be parsed
 */
final class DocumentPreParsedEvent extends AbstractEvent
{
<<<<<<< HEAD
    /** @var Document */
    private $document;

    /** @var MarkdownInputInterface */
    private $markdown;
=======
    /** @psalm-readonly */
    private Document $document;

    private MarkdownInputInterface $markdown;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

    public function __construct(Document $document, MarkdownInputInterface $markdown)
    {
        $this->document = $document;
        $this->markdown = $markdown;
    }

    public function getDocument(): Document
    {
        return $this->document;
    }

    public function getMarkdown(): MarkdownInputInterface
    {
        return $this->markdown;
    }

    public function replaceMarkdown(MarkdownInputInterface $markdownInput): void
    {
        $this->markdown = $markdownInput;
    }
}
