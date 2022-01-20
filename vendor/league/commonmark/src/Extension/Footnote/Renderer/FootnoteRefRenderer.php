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
use League\CommonMark\Extension\Footnote\Node\FootnoteRef;
use League\CommonMark\HtmlElement;
use League\CommonMark\Inline\Element\AbstractInline;
use League\CommonMark\Inline\Renderer\InlineRendererInterface;
use League\CommonMark\Util\ConfigurationAwareInterface;
use League\CommonMark\Util\ConfigurationInterface;

final class FootnoteRefRenderer implements InlineRendererInterface, ConfigurationAwareInterface
{
    /** @var ConfigurationInterface */
    private $config;

    public function render(AbstractInline $inline, ElementRendererInterface $htmlRenderer)
    {
        if (!($inline instanceof FootnoteRef)) {
            throw new \InvalidArgumentException('Incompatible inline type: ' . \get_class($inline));
        }

        $attrs = $inline->getData('attributes', []);
        $class = $attrs['class'] ?? $this->config->get('footnote/ref_class', 'footnote-ref');
        $idPrefix = $this->config->get('footnote/ref_id_prefix', 'fnref:');
=======
use League\CommonMark\Extension\Footnote\Node\FootnoteRef;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;
use League\CommonMark\Xml\XmlNodeRendererInterface;
use League\Config\ConfigurationAwareInterface;
use League\Config\ConfigurationInterface;

final class FootnoteRefRenderer implements NodeRendererInterface, XmlNodeRendererInterface, ConfigurationAwareInterface
{
    private ConfigurationInterface $config;

    /**
     * @param FootnoteRef $node
     *
     * {@inheritDoc}
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer): \Stringable
    {
        FootnoteRef::assertInstanceOf($node);

        $attrs = $node->data->getData('attributes');
        $attrs->append('class', $this->config->get('footnote/ref_class'));
        $attrs->set('href', \mb_strtolower($node->getReference()->getDestination()));
        $attrs->set('role', 'doc-noteref');

        $idPrefix = $this->config->get('footnote/ref_id_prefix');
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

        return new HtmlElement(
            'sup',
            [
<<<<<<< HEAD
                'id' => $idPrefix . \mb_strtolower($inline->getReference()->getLabel()),
            ],
            new HTMLElement(
                'a',
                [
                    'class' => $class,
                    'href'  => \mb_strtolower($inline->getReference()->getDestination()),
                    'role'  => 'doc-noteref',
                ],
                $inline->getReference()->getTitle()
=======
                'id' => $idPrefix . \mb_strtolower($node->getReference()->getLabel()),
            ],
            new HtmlElement(
                'a',
                $attrs->export(),
                $node->getReference()->getTitle()
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
            ),
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
        return 'footnote_ref';
    }

    /**
     * @param FootnoteRef $node
     *
     * @return array<string, scalar>
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function getXmlAttributes(Node $node): array
    {
        FootnoteRef::assertInstanceOf($node);

        return [
            'reference' => $node->getReference()->getLabel(),
        ];
    }
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
}
