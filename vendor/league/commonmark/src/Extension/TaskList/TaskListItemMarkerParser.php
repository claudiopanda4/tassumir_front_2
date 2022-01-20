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

namespace League\CommonMark\Extension\TaskList;

<<<<<<< HEAD
use League\CommonMark\Block\Element\ListItem;
use League\CommonMark\Block\Element\Paragraph;
use League\CommonMark\Inline\Parser\InlineParserInterface;
use League\CommonMark\InlineParserContext;

final class TaskListItemMarkerParser implements InlineParserInterface
{
    public function getCharacters(): array
    {
        return ['['];
=======
use League\CommonMark\Extension\CommonMark\Node\Block\ListItem;
use League\CommonMark\Node\Block\Paragraph;
use League\CommonMark\Parser\Inline\InlineParserInterface;
use League\CommonMark\Parser\Inline\InlineParserMatch;
use League\CommonMark\Parser\InlineParserContext;

final class TaskListItemMarkerParser implements InlineParserInterface
{
    public function getMatchDefinition(): InlineParserMatch
    {
        return InlineParserMatch::oneOf('[ ]', '[x]');
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }

    public function parse(InlineParserContext $inlineContext): bool
    {
        $container = $inlineContext->getContainer();

        // Checkbox must come at the beginning of the first paragraph of the list item
<<<<<<< HEAD
        if ($container->hasChildren() || !($container instanceof Paragraph && $container->parent() && $container->parent() instanceof ListItem)) {
            return false;
        }

        $cursor = $inlineContext->getCursor();
        $oldState = $cursor->saveState();

        $m = $cursor->match('/\[[ xX]\]/');
        if ($m === null) {
            return false;
        }
=======
        if ($container->hasChildren() || ! ($container instanceof Paragraph && $container->parent() && $container->parent() instanceof ListItem)) {
            return false;
        }

        $cursor   = $inlineContext->getCursor();
        $oldState = $cursor->saveState();

        $cursor->advanceBy(3);
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

        if ($cursor->getNextNonSpaceCharacter() === null) {
            $cursor->restoreState($oldState);

            return false;
        }

<<<<<<< HEAD
        $isChecked = $m !== '[ ]';
=======
        $isChecked = $inlineContext->getFullMatch() !== '[ ]';
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

        $container->appendChild(new TaskListItemMarker($isChecked));

        return true;
    }
}
