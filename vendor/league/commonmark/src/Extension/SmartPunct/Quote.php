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
 * Original code based on the CommonMark JS reference parser (http://bitly.com/commonmark-js)
 *  - (c) John MacFarlane
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Extension\SmartPunct;

<<<<<<< HEAD
use League\CommonMark\Inline\Element\AbstractStringContainer;

final class Quote extends AbstractStringContainer
{
    public const DOUBLE_QUOTE = '"';
    public const DOUBLE_QUOTE_OPENER = '“';
    public const DOUBLE_QUOTE_CLOSER = '”';

    public const SINGLE_QUOTE = "'";
=======
use League\CommonMark\Node\Inline\AbstractStringContainer;

final class Quote extends AbstractStringContainer
{
    public const DOUBLE_QUOTE        = '"';
    public const DOUBLE_QUOTE_OPENER = '“';
    public const DOUBLE_QUOTE_CLOSER = '”';

    public const SINGLE_QUOTE        = "'";
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    public const SINGLE_QUOTE_OPENER = '‘';
    public const SINGLE_QUOTE_CLOSER = '’';
}
