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
use League\CommonMark\ElementRendererInterface;
use League\CommonMark\Extension\Footnote\Node\FootnoteBackref;
use League\CommonMark\HtmlElement;
use League\CommonMark\Inline\Element\AbstractInline;
use League\CommonMark\Inline\Renderer\InlineRendererInterface;
use League\CommonMark\Util\ConfigurationAwareInterface;
use League\CommonMark\Util\ConfigurationInterface;

final class FootnoteBackrefRenderer implements InlineRendererInterface, ConfigurationAwareInterface
{
    /** @var ConfigurationInterface */
    private $config;

    public function render(AbstractInline $inline, ElementRendererInterface $htmlRenderer)
    {
        if (!($inline instanceof FootnoteBackref)) {
            throw new \InvalidArgumentException('Incompatible inline type: ' . \get_class($inline));
        }

        $attrs = $inline->getData('attributes', []);
        $attrs['class'] = $attrs['class'] ?? $this->config->get('footnote/backref_class', 'footnote-backref');
        $attrs['rev'] = 'footnote';
        $attrs['href'] = \mb_strtolower($inline->getReference()->getDestination());
        $attrs['role'] = 'doc-backlink';

        return '&nbsp;' . new HtmlElement('a', $attrs, '&#8617;', true);
    }

    public function setConfiguration(ConfigurationInterface $configuration)
    {
        $this->config = $configuration;
    }
=======
use League\CommonMark\Extension\Footnote\Node\FootnoteBackref;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;
use League\CommonMark\Xml\XmlNodeRendererInterface;
use League\Config\ConfigurationAwareInterface;
use League\Config\ConfigurationInterface;

final class FootnoteBackrefRenderer implements NodeRendererInterface, XmlNodeRendererInterface, ConfigurationAwareInterface
{
    public const DEFAULT_SYMBOL = '↩';

    private ConfigurationInterface $config;

    /**
     * @param FootnoteBackref $node
     *
     * {@inheritDoc}
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer): string
    {
        FootnoteBackref::assertInstanceOf($node);

        $attrs = $node->data->getData('attributes');

        $attrs->append('class', $this->config->get('footnote/backref_class'));
        $attrs->set('rev', 'footnote');
        $attrs->set('href', \mb_strtolower($node->getReference()->getDestination()));
        $attrs->set('role', 'doc-backlink');

        $symbol = $this->config->get('footnote/backref_symbol');
        \assert(\is_string($symbol));

        return '&nbsp;' . new HtmlElement('a', $attrs->export(), \htmlspecialchars($symbol), true);
    }

    public function setConfiguration(ConfigurationInterface $configuration): void
    {
        $this->config = $configuration;
    }

    public function getXmlTagName(Node $node): string
    {
        return 'footnote_backref';
    }

    /**
     * @param FootnoteBackref $node
     *
     * @return array<string, scalar>
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function getXmlAttributes(Node $node): array
    {
        FootnoteBackref::assertInstanceOf($node);

        return [
            'reference' => $node->getReference()->getLabel(),
        ];
    }
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
}
