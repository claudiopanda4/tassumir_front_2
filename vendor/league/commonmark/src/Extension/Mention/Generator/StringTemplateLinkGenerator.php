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

final class StringTemplateLinkGenerator implements MentionGeneratorInterface
{
    /** @var string */
    private $urlTemplate;
=======
use League\CommonMark\Node\Inline\AbstractInline;

final class StringTemplateLinkGenerator implements MentionGeneratorInterface
{
    private string $urlTemplate;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

    public function __construct(string $urlTemplate)
    {
        $this->urlTemplate = $urlTemplate;
    }

    public function generateMention(Mention $mention): ?AbstractInline
    {
<<<<<<< HEAD
        return $mention->setUrl(\sprintf($this->urlTemplate, $mention->getIdentifier()));
=======
        $mention->setUrl(\sprintf($this->urlTemplate, $mention->getIdentifier()));

        return $mention;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
