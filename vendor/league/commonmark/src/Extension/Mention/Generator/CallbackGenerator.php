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

namespace League\CommonMark\Extension\Mention\Generator;

use League\CommonMark\Extension\Mention\Mention;
<<<<<<< HEAD
use League\CommonMark\Inline\Element\AbstractInline;
=======
use League\CommonMark\Node\Inline\AbstractInline;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

final class CallbackGenerator implements MentionGeneratorInterface
{
    /**
     * A callback function which sets the URL on the passed mention and returns the mention, return a new AbstractInline based object or null if the mention is not a match
     *
     * @var callable(Mention): ?AbstractInline
     */
    private $callback;

    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    public function generateMention(Mention $mention): ?AbstractInline
    {
<<<<<<< HEAD
        $result = \call_user_func_array($this->callback, [$mention]);
=======
        $result = \call_user_func($this->callback, $mention);
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        if ($result === null) {
            return null;
        }

<<<<<<< HEAD
        if ($result instanceof AbstractInline && !($result instanceof Mention)) {
=======
        if ($result instanceof AbstractInline && ! ($result instanceof Mention)) {
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            return $result;
        }

        if ($result instanceof Mention && $result->hasUrl()) {
            return $mention;
        }

        throw new \RuntimeException('CallbackGenerator callable must set the URL on the passed mention and return the mention, return a new AbstractInline based object or null if the mention is not a match');
    }
}
