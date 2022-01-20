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

namespace League\CommonMark\Extension\Mention;

<<<<<<< HEAD
use League\CommonMark\Inline\Element\Link;
use League\CommonMark\Inline\Element\Text;

class Mention extends Link
{
    /** @var string */
    private $symbol;

    /** @var string */
    private $identifier;

    /**
     * @param string $symbol
     * @param string $identifier
     * @param string $label
     */
    public function __construct(string $symbol, string $identifier, string $label = null)
    {
        $this->symbol = $symbol;
        $this->identifier = $identifier;

        parent::__construct('', $label ?? \sprintf('%s%s', $symbol, $identifier));
    }

    /**
     * @return string|null
     */
=======
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use League\CommonMark\Node\Inline\Text;

class Mention extends Link
{
    private string $name;

    private string $prefix;

    private string $identifier;

    public function __construct(string $name, string $prefix, string $identifier, ?string $label = null)
    {
        $this->name       = $name;
        $this->prefix     = $prefix;
        $this->identifier = $identifier;

        parent::__construct('', $label ?? \sprintf('%s%s', $prefix, $identifier));
    }

>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    public function getLabel(): ?string
    {
        if (($labelNode = $this->findLabelNode()) === null) {
            return null;
        }

<<<<<<< HEAD
        return $labelNode->getContent();
    }

    /**
     * @return string
     */
=======
        return $labelNode->getLiteral();
    }

>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

<<<<<<< HEAD
    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @return bool
     */
    public function hasUrl(): bool
    {
        return !empty($this->url);
    }

    /**
     * @param string $label
     *
=======
    public function getName(): ?string
    {
        return $this->name;
    }

    public function getPrefix(): string
    {
        return $this->prefix;
    }

    public function hasUrl(): bool
    {
        return $this->url !== '';
    }

    /**
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
     * @return $this
     */
    public function setLabel(string $label): self
    {
        if (($labelNode = $this->findLabelNode()) === null) {
            $labelNode = new Text();
            $this->prependChild($labelNode);
        }

<<<<<<< HEAD
        $labelNode->setContent($label);
=======
        $labelNode->setLiteral($label);
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

        return $this;
    }

    private function findLabelNode(): ?Text
    {
        foreach ($this->children() as $child) {
            if ($child instanceof Text) {
                return $child;
            }
        }

        return null;
    }
}
