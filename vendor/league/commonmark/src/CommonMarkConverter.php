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

namespace League\CommonMark;

<<<<<<< HEAD
/**
 * Converts CommonMark-compatible Markdown to HTML.
 */
class CommonMarkConverter extends MarkdownConverter
{
    /**
     * The currently-installed version.
     *
     * This might be a typical `x.y.z` version, or `x.y-dev`.
     *
     * @deprecated in 1.5.0 and will be removed from 2.0.0.
     *   Use \Composer\InstalledVersions provided by composer-runtime-api instead.
     */
    public const VERSION = '1.6.6';

    /**
     * Create a new commonmark converter instance.
     *
     * @param array<string, mixed>      $config
     * @param EnvironmentInterface|null $environment
     */
    public function __construct(array $config = [], EnvironmentInterface $environment = null)
    {
        if ($environment === null) {
            $environment = Environment::createCommonMarkEnvironment();
        } else {
            @\trigger_error(\sprintf('Passing an $environment into the "%s" constructor is deprecated in 1.6 and will not be supported in 2.0; use MarkdownConverter instead. See https://commonmark.thephpleague.com/2.0/upgrading/consumers/#commonmarkconverter-and-githubflavoredmarkdownconverter-constructors for more details.', self::class), \E_USER_DEPRECATED);
        }

        if ($environment instanceof ConfigurableEnvironmentInterface) {
            $environment->mergeConfig($config);
        }

        parent::__construct($environment);
    }
=======
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;

/**
 * Converts CommonMark-compatible Markdown to HTML.
 */
final class CommonMarkConverter extends MarkdownConverter
{
    /**
     * Create a new Markdown converter pre-configured for CommonMark
     *
     * @param array<string, mixed> $config
     */
    public function __construct(array $config = [])
    {
        $environment = new Environment($config);
        $environment->addExtension(new CommonMarkCoreExtension());

        parent::__construct($environment);
    }

    public function getEnvironment(): Environment
    {
        \assert($this->environment instanceof Environment);

        return $this->environment;
    }
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
}
