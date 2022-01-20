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
 * Original code based on the CommonMark JS reference parser (https://bitly.com/commonmark-js)
 *  - (c) John MacFarlane
 *
 * Additional emphasis processing code based on commonmark-java (https://github.com/atlassian/commonmark-java)
 *  - (c) Atlassian Pty Ltd
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Delimiter\Processor;

use League\CommonMark\Delimiter\DelimiterInterface;
<<<<<<< HEAD
use League\CommonMark\Inline\Element\AbstractStringContainer;
=======
use League\CommonMark\Node\Inline\AbstractStringContainer;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

/**
 * Interface for a delimiter processor
 */
interface DelimiterProcessorInterface
{
    /**
     * Returns the character that marks the beginning of a delimited node.
     *
     * This must not clash with any other processors being added to the environment.
<<<<<<< HEAD
     *
     * @return string
=======
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
     */
    public function getOpeningCharacter(): string;

    /**
     * Returns the character that marks the ending of a delimited node.
     *
     * This must not clash with any other processors being added to the environment.
     *
     * Note that for a symmetric delimiter such as "*", this is the same as the opening.
<<<<<<< HEAD
     *
     * @return string
=======
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
     */
    public function getClosingCharacter(): string;

    /**
     * Minimum number of delimiter characters that are needed to active this.
     *
     * Must be at least 1.
<<<<<<< HEAD
     *
     * @return int
=======
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
     */
    public function getMinLength(): int;

    /**
     * Determine how many (if any) of the delimiter characters should be used.
     *
     * This allows implementations to decide how many characters to be used
     * based on the properties of the delimiter runs. An implementation can also
     * return 0 when it doesn't want to allow this particular combination of
     * delimiter runs.
     *
     * @param DelimiterInterface $opener The opening delimiter run
     * @param DelimiterInterface $closer The closing delimiter run
<<<<<<< HEAD
     *
     * @return int
=======
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
     */
    public function getDelimiterUse(DelimiterInterface $opener, DelimiterInterface $closer): int;

    /**
     * Process the matched delimiters, e.g. by wrapping the nodes between opener
     * and closer in a new node, or appending a new node after the opener.
     *
     * Note that removal of the delimiter from the delimiter nodes and detaching
     * them is done by the caller.
     *
     * @param AbstractStringContainer $opener       The node that contained the opening delimiter
     * @param AbstractStringContainer $closer       The node that contained the closing delimiter
     * @param int                     $delimiterUse The number of delimiters that were used
<<<<<<< HEAD
     *
     * @return void
     */
    public function process(AbstractStringContainer $opener, AbstractStringContainer $closer, int $delimiterUse);
=======
     */
    public function process(AbstractStringContainer $opener, AbstractStringContainer $closer, int $delimiterUse): void;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
}
