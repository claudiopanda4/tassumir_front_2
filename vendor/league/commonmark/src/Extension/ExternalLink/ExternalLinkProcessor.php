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

namespace League\CommonMark\Extension\ExternalLink;

<<<<<<< HEAD
use League\CommonMark\EnvironmentInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Inline\Element\Link;

final class ExternalLinkProcessor
{
    public const APPLY_NONE = '';
    public const APPLY_ALL = 'all';
    public const APPLY_EXTERNAL = 'external';
    public const APPLY_INTERNAL = 'internal';

    /** @var EnvironmentInterface */
    private $environment;

    public function __construct(EnvironmentInterface $environment)
    {
        $this->environment = $environment;
    }

    /**
     * @param DocumentParsedEvent $e
     *
     * @return void
     */
    public function __invoke(DocumentParsedEvent $e)
    {
        $internalHosts = $this->environment->getConfig('external_link/internal_hosts', []);
        $openInNewWindow = $this->environment->getConfig('external_link/open_in_new_window', false);
        $classes = $this->environment->getConfig('external_link/html_class', '');

        $walker = $e->getDocument()->walker();
        while ($event = $walker->next()) {
            if ($event->isEntering() && $event->getNode() instanceof Link) {
                /** @var Link $link */
                $link = $event->getNode();

                $host = parse_url($link->getUrl(), PHP_URL_HOST);
                if (empty($host)) {
                    // Something is terribly wrong with this URL
                    continue;
                }

                if (self::hostMatches($host, $internalHosts)) {
                    $link->data['external'] = false;
                    $this->applyRelAttribute($link, false);
                    continue;
                }

                // Host does not match our list
                $this->markLinkAsExternal($link, $openInNewWindow, $classes);
            }
=======
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use League\Config\ConfigurationInterface;

final class ExternalLinkProcessor
{
    public const APPLY_NONE     = '';
    public const APPLY_ALL      = 'all';
    public const APPLY_EXTERNAL = 'external';
    public const APPLY_INTERNAL = 'internal';

    /** @psalm-readonly */
    private ConfigurationInterface $config;

    public function __construct(ConfigurationInterface $config)
    {
        $this->config = $config;
    }

    public function __invoke(DocumentParsedEvent $e): void
    {
        $internalHosts   = $this->config->get('external_link/internal_hosts');
        $openInNewWindow = $this->config->get('external_link/open_in_new_window');
        $classes         = $this->config->get('external_link/html_class');

        foreach ($e->getDocument()->iterator() as $link) {
            if (! ($link instanceof Link)) {
                continue;
            }

            $host = \parse_url($link->getUrl(), PHP_URL_HOST);
            if (! \is_string($host)) {
                // Something is terribly wrong with this URL
                continue;
            }

            if (self::hostMatches($host, $internalHosts)) {
                $link->data->set('external', false);
                $this->applyRelAttribute($link, false);
                continue;
            }

            // Host does not match our list
            $this->markLinkAsExternal($link, $openInNewWindow, $classes);
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        }
    }

    private function markLinkAsExternal(Link $link, bool $openInNewWindow, string $classes): void
    {
<<<<<<< HEAD
        $link->data['external'] = true;
        $link->data['attributes'] = $link->getData('attributes', []);
        $this->applyRelAttribute($link, true);

        if ($openInNewWindow) {
            $link->data['attributes']['target'] = '_blank';
        }

        if (!empty($classes)) {
            $link->data['attributes']['class'] = trim(($link->data['attributes']['class'] ?? '') . ' ' . $classes);
=======
        $link->data->set('external', true);
        $this->applyRelAttribute($link, true);

        if ($openInNewWindow) {
            $link->data->set('attributes/target', '_blank');
        }

        if ($classes !== '') {
            $link->data->append('attributes/class', $classes);
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        }
    }

    private function applyRelAttribute(Link $link, bool $isExternal): void
    {
<<<<<<< HEAD
        $rel = [];

        $options = [
            'nofollow'   => $this->environment->getConfig('external_link/nofollow', self::APPLY_NONE),
            'noopener'   => $this->environment->getConfig('external_link/noopener', self::APPLY_EXTERNAL),
            'noreferrer' => $this->environment->getConfig('external_link/noreferrer', self::APPLY_EXTERNAL),
=======
        $options = [
            'nofollow'   => $this->config->get('external_link/nofollow'),
            'noopener'   => $this->config->get('external_link/noopener'),
            'noreferrer' => $this->config->get('external_link/noreferrer'),
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        ];

        foreach ($options as $type => $option) {
            switch (true) {
                case $option === self::APPLY_ALL:
                case $isExternal && $option === self::APPLY_EXTERNAL:
<<<<<<< HEAD
                case !$isExternal && $option === self::APPLY_INTERNAL:
                    $rel[] = $type;
            }
        }

        if ($rel === []) {
            return;
        }

        $link->data['attributes']['rel'] = \implode(' ', $rel);
    }

    /**
     * @param string $host
     * @param mixed  $compareTo
     *
     * @return bool
     *
     * @internal This method is only public so we can easily test it. DO NOT USE THIS OUTSIDE OF THIS EXTENSION!
     */
    public static function hostMatches(string $host, $compareTo)
    {
        foreach ((array) $compareTo as $c) {
            if (strpos($c, '/') === 0) {
                if (preg_match($c, $host)) {
=======
                case ! $isExternal && $option === self::APPLY_INTERNAL:
                    $link->data->append('attributes/rel', $type);
            }
        }
    }

    /**
     * @internal This method is only public so we can easily test it. DO NOT USE THIS OUTSIDE OF THIS EXTENSION!
     *
     * @param mixed $compareTo
     */
    public static function hostMatches(string $host, $compareTo): bool
    {
        foreach ((array) $compareTo as $c) {
            if (\strpos($c, '/') === 0) {
                if (\preg_match($c, $host)) {
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
                    return true;
                }
            } elseif ($c === $host) {
                return true;
            }
        }

        return false;
    }
}
