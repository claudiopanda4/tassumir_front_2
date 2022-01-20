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

namespace League\CommonMark;

<<<<<<< HEAD
/**
 * Converts Github Flavored Markdown to HTML.
 */
class GithubFlavoredMarkdownConverter extends CommonMarkConverter
{
    /**
     * Create a new commonmark converter instance.
     *
     * @param array<string, mixed>      $config
     * @param EnvironmentInterface|null $environment
     */
    public function __construct(array $config = [], EnvironmentInterface $environment = null)
    {
        if ($environment === null) {
            $environment = Environment::createGFMEnvironment();
        } else {
            @\trigger_error(\sprintf('Passing an $environment into the "%s" constructor is deprecated in 1.6 and will not be supported in 2.0; use MarkdownConverter instead. See https://commonmark.thephpleague.com/2.0/upgrading/consumers/#commonmarkconverter-and-githubflavoredmarkdownconverter-constructors for more details.', self::class), \E_USER_DEPRECATED);
        }

        if ($environment instanceof ConfigurableEnvironmentInterface) {
            $environment->mergeConfig($config);
        }

        MarkdownConverter::__construct($environment);
=======
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;

/**
 * Converts GitHub Flavored Markdown to HTML.
 */
final class GithubFlavoredMarkdownConverter extends MarkdownConverter
{
    /**
     * Create a new Markdown converter pre-configured for GFM
     *
     * @param array<string, mixed> $config
     */
    public function __construct(array $config = [])
    {
        $environment = new Environment($config);
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new GithubFlavoredMarkdownExtension());

        parent::__construct($environment);
    }

    public function getEnvironment(): Environment
    {
        \assert($this->environment instanceof Environment);

        return $this->environment;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
