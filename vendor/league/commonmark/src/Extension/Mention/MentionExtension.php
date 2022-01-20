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

namespace League\CommonMark\Extension\Mention;

<<<<<<< HEAD
use League\CommonMark\ConfigurableEnvironmentInterface;
use League\CommonMark\Exception\InvalidOptionException;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Extension\Mention\Generator\MentionGeneratorInterface;

final class MentionExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $mentions = $environment->getConfig('mentions', []);
        foreach ($mentions as $name => $mention) {
            if (\array_key_exists('symbol', $mention)) {
                @\trigger_error('The "mentions/*/symbol" configuration option is deprecated in league/commonmark 1.6; rename "symbol" to "prefix" for compatibility with 2.0', \E_USER_DEPRECATED);
                $mention['prefix'] = $mention['symbol'];
            }

            if (\array_key_exists('pattern', $mention)) {
                // v2.0 does not allow full regex patterns passeed into the configuration
                if (!self::isAValidPartialRegex($mention['pattern'])) {
                    throw new InvalidOptionException(\sprintf('Option "mentions/%s/pattern" must not include starting/ending delimiters (like "/")', $name));
                }

                $mention['pattern'] = '/' . $mention['pattern'] . '/i';
            } elseif (\array_key_exists('regex', $mention)) {
                @\trigger_error('The "mentions/*/regex" configuration option is deprecated in league/commonmark 1.6; rename "regex" to "pattern" for compatibility with 2.0', \E_USER_DEPRECATED);
                $mention['pattern'] = $mention['regex'];
            }

            foreach (['prefix', 'pattern', 'generator'] as $key) {
                if (empty($mention[$key])) {
                    throw new \RuntimeException("Missing \"$key\" from MentionParser configuration");
                }
            }
            if ($mention['generator'] instanceof MentionGeneratorInterface) {
                $environment->addInlineParser(new MentionParser($mention['prefix'], $mention['pattern'], $mention['generator']));
            } elseif (is_string($mention['generator'])) {
                $environment->addInlineParser(MentionParser::createWithStringTemplate($mention['prefix'], $mention['pattern'], $mention['generator']));
            } elseif (is_callable($mention['generator'])) {
                $environment->addInlineParser(MentionParser::createWithCallback($mention['prefix'], $mention['pattern'], $mention['generator']));
            } else {
                throw new \RuntimeException(sprintf('The "generator" provided for the MentionParser configuration must be a string template, callable, or an object that implements %s.', MentionGeneratorInterface::class));
            }
        }
    }

    private static function isAValidPartialRegex(string $regex): bool
    {
        $regex = '/' . $regex . '/i';

        return @\preg_match($regex, '') !== false;
    }
=======
use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\ConfigurableExtensionInterface;
use League\CommonMark\Extension\Mention\Generator\MentionGeneratorInterface;
use League\Config\ConfigurationBuilderInterface;
use League\Config\Exception\InvalidConfigurationException;
use Nette\Schema\Expect;

final class MentionExtension implements ConfigurableExtensionInterface
{
    public function configureSchema(ConfigurationBuilderInterface $builder): void
    {
        $isAValidPartialRegex = static function (string $regex): bool {
            $regex = '/' . $regex . '/i';

            return @\preg_match($regex, '') !== false;
        };

        $builder->addSchema('mentions', Expect::arrayOf(
            Expect::structure([
                'prefix' => Expect::string()->required(),
                'pattern' => Expect::string()->assert($isAValidPartialRegex, 'Pattern must not include starting/ending delimiters (like "/")')->required(),
                'generator' => Expect::anyOf(
                    Expect::type(MentionGeneratorInterface::class),
                    Expect::string(),
                    Expect::type('callable')
                )->required(),
            ])
        ));
    }

    public function register(EnvironmentBuilderInterface $environment): void
    {
        $mentions = $environment->getConfiguration()->get('mentions');
        foreach ($mentions as $name => $mention) {
            if ($mention['generator'] instanceof MentionGeneratorInterface) {
                $environment->addInlineParser(new MentionParser($name, $mention['prefix'], $mention['pattern'], $mention['generator']));
            } elseif (\is_string($mention['generator'])) {
                $environment->addInlineParser(MentionParser::createWithStringTemplate($name, $mention['prefix'], $mention['pattern'], $mention['generator']));
            } elseif (\is_callable($mention['generator'])) {
                $environment->addInlineParser(MentionParser::createWithCallback($name, $mention['prefix'], $mention['pattern'], $mention['generator']));
            } else {
                throw new InvalidConfigurationException(\sprintf('The "generator" provided for the "%s" MentionParser configuration must be a string template, callable, or an object that implements %s.', $name, MentionGeneratorInterface::class));
            }
        }
    }
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
}
