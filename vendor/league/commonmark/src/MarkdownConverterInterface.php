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

namespace League\CommonMark;

<<<<<<< HEAD
=======
use League\CommonMark\Output\RenderedContentInterface;

>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
/**
 * Interface for a service which converts Markdown to HTML.
 */
interface MarkdownConverterInterface
{
    /**
     * Converts Markdown to HTML.
     *
<<<<<<< HEAD
     * @param string $markdown
     *
     * @throws \RuntimeException
     *
     * @return string HTML
     *
     * @api
     */
    public function convertToHtml(string $markdown): string;
=======
     * @throws \RuntimeException
     */
    public function convertToHtml(string $markdown): RenderedContentInterface;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
}
