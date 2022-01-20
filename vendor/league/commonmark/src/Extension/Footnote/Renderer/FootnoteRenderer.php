<?php

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 * (c) Rezo Zero / Ambroise Maupate
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace League\CommonMark\Extension\Footnote\Renderer;

<<<<<<< HEAD
use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Block\Renderer\BlockRendererInterface;
use League\CommonMark\ElementRendererInterface;
use League\CommonMark\Extension\Footnote\Node\Footnote;
use League\CommonMark\HtmlElement;
use League\CommonMark\Util\ConfigurationAwareInterface;
use League\CommonMark\Util\ConfigurationInterface;

final class FootnoteRenderer implements BlockRendererInterface, ConfigurationAwareInterface
{
    /** @var ConfigurationInterface */
    private $config;

    /**
     * @param Footnote                 $block
     * @param ElementRendererInterface $htmlRenderer
     * @param bool                     $inTightList
     *
     * @return HtmlElement
     */
    public function render(AbstractBlock $block, ElementRendererInterface $htmlRenderer, bool $inTightList = false)
    {
        if (!($block instanceof Footnote)) {
            throw new \InvalidArgumentException('Incompatible block type: ' . \get_class($block));
        }

        $attrs = $block->getData('attributes', []);
        $attrs['class'] = $attrs['class'] ?? $this->config->get('footnote/footnote_class', 'footnote');
        $attrs['id'] = $this->config->get('footnote/footnote_id_prefix', 'fn:') . \mb_strtolower($block->getReference()->getLabel());
        $attrs['role'] = 'doc-endnote';

        foreach ($block->getBackrefs() as $backref) {
            $block->lastChild()->appendChild($backref);
        }

        return new HtmlElement(
            'li',
            $attrs,
            $htmlRenderer->renderBlocks($block->children()),
=======
use League\CommonMark\Extension\Footnote\Node\Footnote;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;
use League\CommonMark\Xml\XmlNodeRendererInterface;
use League\Config\ConfigurationAwareInterface;
use League\Config\ConfigurationInterface;

final class FootnoteRenderer implements NodeRendererInterface, XmlNodeRendererInterface, ConfigurationAwareInterface
{
    private ConfigurationInterface $config;

    /**
     * @param Footnote $node
     *
     * {@inheritDoc}
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer): \Stringable
    {
        Footnote::assertInstanceOf($node);

        $attrs = $node->data->getData('attributes');

        $attrs->append('class', $this->config->get('footnote/footnote_class'));
        $attrs->set('id', $this->config->get('footnote/footnote_id_prefix') . \mb_strtolower($node->getReference()->getLabel()));
        $attrs->set('role', 'doc-endnote');

        return new HtmlElement(
            'li',
            $attrs->export(),
            $childRenderer->renderNodes($node->children()),
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            true
        );
    }

<<<<<<< HEAD
    public function setConfiguration(ConfigurationInterface $configuration)
    {
        $this->config = $configuration;
    }
=======
    public function setConfiguration(ConfigurationInterface $configuration): void
    {
        $this->config = $configuration;
    }

    public function getXmlTagName(Node $node): string
    {
        return 'footnote';
    }

    /**
     * @param Footnote $node
     *
     * @return array<string, scalar>
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function getXmlAttributes(Node $node): array
    {
        Footnote::assertInstanceOf($node);

        return [
            'reference' => $node->getReference()->getLabel(),
        ];
    }
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
}
