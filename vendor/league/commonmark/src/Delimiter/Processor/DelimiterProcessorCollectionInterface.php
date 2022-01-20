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

<<<<<<< HEAD
interface DelimiterProcessorCollectionInterface
=======
interface DelimiterProcessorCollectionInterface extends \Countable
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
{
    /**
     * Add the given delim processor to the collection
     *
     * @param DelimiterProcessorInterface $processor The delim processor to add
     *
     * @throws \InvalidArgumentException Exception will be thrown if attempting to add multiple processors for the same character
<<<<<<< HEAD
     *
     * @return void
     */
    public function add(DelimiterProcessorInterface $processor);

    /**
     * Returns the delim processor which handles the given character if one exists
     *
     * @param string $char
     *
     * @return DelimiterProcessorInterface|null
=======
     */
    public function add(DelimiterProcessorInterface $processor): void;

    /**
     * Returns the delim processor which handles the given character if one exists
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
     */
    public function getDelimiterProcessor(string $char): ?DelimiterProcessorInterface;

    /**
     * Returns an array of delimiter characters who have associated processors
     *
     * @return string[]
     */
    public function getDelimiterCharacters(): array;
}
