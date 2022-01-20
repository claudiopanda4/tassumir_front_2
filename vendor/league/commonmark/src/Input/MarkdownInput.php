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

namespace League\CommonMark\Input;

use League\CommonMark\Exception\UnexpectedEncodingException;

<<<<<<< HEAD
final class MarkdownInput implements MarkdownInputInterface
{
    /** @var array<int, string>|null */
    private $lines;

    /** @var string */
    private $content;

    /** @var int|null */
    private $lineCount;

    public function __construct(string $content)
    {
        if (!\mb_check_encoding($content, 'UTF-8')) {
            throw new UnexpectedEncodingException('Unexpected encoding - UTF-8 or ASCII was expected');
        }

        $this->content = $content;
=======
class MarkdownInput implements MarkdownInputInterface
{
    /**
     * @var array<int, string>|null
     *
     * @psalm-readonly-allow-private-mutation
     */
    private ?array $lines = null;

    /** @psalm-readonly-allow-private-mutation */
    private string $content;

    /** @psalm-readonly-allow-private-mutation */
    private ?int $lineCount = null;

    /** @psalm-readonly */
    private int $lineOffset;

    public function __construct(string $content, int $lineOffset = 0)
    {
        if (! \mb_check_encoding($content, 'UTF-8')) {
            throw new UnexpectedEncodingException('Unexpected encoding - UTF-8 or ASCII was expected');
        }

        // Strip any leading UTF-8 BOM
        if (\substr($content, 0, 3) === "\xEF\xBB\xBF") {
            $content = \substr($content, 3);
        }

        $this->content    = $content;
        $this->lineOffset = $lineOffset;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }

    public function getContent(): string
    {
        return $this->content;
    }

    /**
<<<<<<< HEAD
     * @return \Traversable<int, string>
     */
    public function getLines(): \Traversable
    {
        $this->splitLinesIfNeeded();

        foreach ($this->lines as $lineNumber => $line) {
            yield $lineNumber => $line;
=======
     * {@inheritDoc}
     */
    public function getLines(): iterable
    {
        $this->splitLinesIfNeeded();

        \assert($this->lines !== null);

        /** @psalm-suppress PossiblyNullIterator */
        foreach ($this->lines as $i => $line) {
            yield $this->lineOffset + $i + 1 => $line;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        }
    }

    public function getLineCount(): int
    {
        $this->splitLinesIfNeeded();

<<<<<<< HEAD
=======
        \assert($this->lineCount !== null);

>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        return $this->lineCount;
    }

    private function splitLinesIfNeeded(): void
    {
        if ($this->lines !== null) {
            return;
        }

        $lines = \preg_split('/\r\n|\n|\r/', $this->content);
        if ($lines === false) {
            throw new UnexpectedEncodingException('Failed to split Markdown content by line');
        }

        $this->lines = $lines;

        // Remove any newline which appears at the very end of the string.
        // We've already split the document by newlines, so we can simply drop
        // any empty element which appears on the end.
        if (\end($this->lines) === '') {
            \array_pop($this->lines);
        }

        $this->lineCount = \count($this->lines);
    }
}
