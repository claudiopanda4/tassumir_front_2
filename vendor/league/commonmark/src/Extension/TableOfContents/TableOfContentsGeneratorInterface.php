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

namespace League\CommonMark\Extension\TableOfContents;

<<<<<<< HEAD
use League\CommonMark\Block\Element\Document;
use League\CommonMark\Extension\TableOfContents\Node\TableOfContents;
=======
use League\CommonMark\Extension\TableOfContents\Node\TableOfContents;
use League\CommonMark\Node\Block\Document;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

interface TableOfContentsGeneratorInterface
{
    public function generate(Document $document): ?TableOfContents;
}
<<<<<<< HEAD

// Trigger autoload without causing a deprecated error
\class_exists(TableOfContents::class);
=======
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
