<?php

declare(strict_types=1);

/*
 * This is part of the league/commonmark package.
 *
 * (c) Martin Hasoň <martin.hason@gmail.com>
 * (c) Webuni s.r.o. <info@webuni.cz>
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Extension\Table;

<<<<<<< HEAD
use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Block\Renderer\BlockRendererInterface;
use League\CommonMark\ElementRendererInterface;
use League\CommonMark\HtmlElement;

final class TableRenderer implements BlockRendererInterface
{
    public function render(AbstractBlock $block, ElementRendererInterface $htmlRenderer, bool $inTightList = false)
    {
        if (!$block instanceof Table) {
            throw new \InvalidArgumentException('Incompatible block type: ' . get_class($block));
        }

        $attrs = $block->getData('attributes', []);

        $separator = $htmlRenderer->getOption('inner_separator', "\n");

        $children = $htmlRenderer->renderBlocks($block->children());

        return new HtmlElement('table', $attrs, $separator . \trim($children) . $separator);
    }
=======
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;
use League\CommonMark\Xml\XmlNodeRendererInterface;

final class TableRenderer implements NodeRendererInterface, XmlNodeRendererInterface
{
    /**
     * @param Table $node
     *
     * {@inheritDoc}
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer): \Stringable
    {
        Table::assertInstanceOf($node);

        $attrs = $node->data->get('attributes');

        $separator = $childRenderer->getInnerSeparator();

        $children = $childRenderer->renderNodes($node->children());

        return new HtmlElement('table', $attrs, $separator . \trim($children) . $separator);
    }

    public function getXmlTagName(Node $node): string
    {
        return 'table';
    }

    /**
     * {@inheritDoc}
     */
    public function getXmlAttributes(Node $node): array
    {
        return [];
    }
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
}
