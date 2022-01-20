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
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Util;

/**
 * Utility class for handling/generating XML and HTML
<<<<<<< HEAD
=======
 *
 * @psalm-immutable
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
 */
final class Xml
{
    /**
<<<<<<< HEAD
     * @param string $string
     *
     * @return string
     */
    public static function escape($string)
=======
     * @psalm-pure
     */
    public static function escape(string $string): string
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    {
        return \str_replace(['&', '<', '>', '"'], ['&amp;', '&lt;', '&gt;', '&quot;'], $string);
    }
}
