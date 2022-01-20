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

namespace League\CommonMark\Extension\InlinesOnly;

<<<<<<< HEAD
use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Block\Element\Document;
use League\CommonMark\Block\Element\InlineContainerInterface;
use League\CommonMark\Block\Renderer\BlockRendererInterface;
use League\CommonMark\ElementRendererInterface;
use League\CommonMark\Inline\Element\AbstractInline;
=======
use League\CommonMark\Node\Block\Document;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

/**
 * Simply renders child elements as-is, adding newlines as needed.
 */
<<<<<<< HEAD
final class ChildRenderer implements BlockRendererInterface
{
    public function render(AbstractBlock $block, ElementRendererInterface $htmlRenderer, bool $inTightList = false)
    {
        $out = '';

        if ($block instanceof InlineContainerInterface) {
            /** @var iterable<AbstractInline> $children */
            $children = $block->children();
            $out .= $htmlRenderer->renderInlines($children);
        } else {
            /** @var iterable<AbstractBlock> $children */
            $children = $block->children();
            $out .= $htmlRenderer->renderBlocks($children);
        }

        if (!($block instanceof Document)) {
            $out .= "\n";
=======
final class ChildRenderer implements NodeRendererInterface
{
    public function render(Node $node, ChildNodeRendererInterface $childRenderer): string
    {
        $out = $childRenderer->renderNodes($node->children());
        if (! $node instanceof Document) {
            $out .= $childRenderer->getBlockSeparator();
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        }

        return $out;
    }
}
