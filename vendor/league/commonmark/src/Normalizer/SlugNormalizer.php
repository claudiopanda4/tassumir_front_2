<?php

declare(strict_types=1);

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Normalizer;

<<<<<<< HEAD
/**
 * Creates URL-friendly strings based on the given string input
 */
final class SlugNormalizer implements TextNormalizerInterface
{
    /**
     * {@inheritdoc}
     */
    public function normalize(string $text, $context = null): string
    {
        // Trim whitespace
        $slug = \trim($text);
=======
use League\Config\ConfigurationAwareInterface;
use League\Config\ConfigurationInterface;

/**
 * Creates URL-friendly strings based on the given string input
 */
final class SlugNormalizer implements TextNormalizerInterface, ConfigurationAwareInterface
{
    /** @psalm-allow-private-mutation */
    private int $defaultMaxLength = 255;

    public function setConfiguration(ConfigurationInterface $configuration): void
    {
        $this->defaultMaxLength = $configuration->get('slug_normalizer/max_length');
    }

    /**
     * {@inheritDoc}
     *
     * @psalm-immutable
     */
    public function normalize(string $text, array $context = []): string
    {
        // Add any requested prefix
        $slug = ($context['prefix'] ?? '') . $text;
        // Trim whitespace
        $slug = \trim($slug);
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        // Convert to lowercase
        $slug = \mb_strtolower($slug);
        // Try replacing whitespace with a dash
        $slug = \preg_replace('/\s+/u', '-', $slug) ?? $slug;
        // Try removing characters other than letters, numbers, and marks.
        $slug = \preg_replace('/[^\p{L}\p{Nd}\p{Nl}\p{M}-]+/u', '', $slug) ?? $slug;
<<<<<<< HEAD
=======
        // Trim to requested length if given
        if ($length = $context['length'] ?? $this->defaultMaxLength) {
            $slug = \mb_substr($slug, 0, $length);
        }
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7

        return $slug;
    }
}
