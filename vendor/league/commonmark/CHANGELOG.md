# Change Log
All notable changes to this project will be documented in this file.
Updates should follow the [Keep a CHANGELOG](https://keepachangelog.com/) principles.

<<<<<<< HEAD
## [Unreleased][unreleased]

## [1.6.6] - 2021-07-17

### Fixed

 - Fixed Mentions inside of links creating nested links against the spec's rules (#688)

## [1.6.5] - 2021-06-26

### Changed

 - Simplified checks for thematic breaks

### Fixed

 - Fixed ExternalLinkProcessor not handling autolinks by adjusting its priority to -50 (#681)

## [1.6.4] - 2021-06-19

### Changed

 - Optimized attribute parsing to avoid inspecting every space character (30% performance boost)

## [1.6.3] - 2021-06-19

### Fixed

 - Fixed incorrect parsing of tilde-fenced code blocks with leading spaces (#676)

## [1.6.2] - 2021-05-12

### Fixed

 - Fixed incorrect error level for deprecation notices

## [1.6.1] - 2021-05-08

### Fixed

 - Fixed `HeadingPermalinkProcessor` skipping text contents from certain nodes (#615)

## [1.6.0] - 2021-05-01

### Added

 - Added forward-compatibility for [configuration options which will be changing in 2.0](https://commonmark.thephpleague.com/1.6/upgrading/):
   - `commonmark/enable_em` (currently `enable_em` in 1.x)
   - `commonmark/enable_strong` (currently `enable_strong` in 1.x)
   - `commonmark/use_asterisk` (currently `use_asterisk` in 1.x)
   - `commonmark/use_underscore` (currently `use_underscore` in 1.x)
   - `commonmark/unordered_list_markers` (currently `unordered_list_markers` in 1.x)
   - `mentions/*/prefix` (currently `mentions/*/symbol` in 1.x)
   - `mentions/*/pattern` (currently `mentions/*/regex` in 1.x)
   - `max_nesting_level` (currently supports `int` and `float` values in 1.x; will only support `int` in 2.0)
 - Added new `MarkdownConverter` class for creating converters with custom environments; this replaces the previously-deprecated `Converter` class
 - Added new `RegexHelper::matchFirst()` method
 - Added new `Configuration::exists()` method

### Changed

 - The `max_nesting_level` option now defaults to `PHP_INT_MAX` instead of `INF`

### Deprecated

 - Deprecated the [configuration options shown above](https://commonmark.thephpleague.com/1.6/upgrading/)
 - Deprecated the ability to pass a custom `Environment` into the constructors of `CommonMarkConverter` and `GithubFlavoredMarkdownConverter`; use `MarkdownConverter` instead
 - Deprecated `ConfigurableEnvironmentInterface::setConfig()`; use `mergeConfig()` instead
 - Deprecated calling `ConfigurableEnvironmentInterface::mergeConfig()` without any parameters
 - Deprecated calling `Configuration::get()` and `EnvironmentInterface::getConfig()` without any parameters
 - Deprecated calling `Configuration::set()` without the second `$value` parameter
 - Deprecated `RegexHelper::matchAll()`; use `RegexHelper::matchFirst()` instead
 - Deprecated extending the `ArrayCollection` class; will be marked `final` in 2.0

### Fixed

 - Fixed missing check for empty arrays being passed into the `unordered_list_markers` configuration option

## [1.5.8] - 2021-03-28

### Fixed

 - Fixed Table of Contents not rendering heading inlines properly (#587, #588)
 - Fixed parsing of tables within list items (#590)

## [1.5.7] - 2020-10-31

### Fixed

 - Fixed mentions not being parsed when appearing after non-word characters (#582)

## [1.5.6] - 2020-10-17

### Changed

 - Blocks added outside of the parsing context now have their start/end line numbers defaulted to 0 to avoid type errors (#579)

### Fixed

 - Fixed replacement blocks not inheriting the start line number of the container they're replacing (#579)
 - Fixed Table of Contents blocks not having correct start/end line numbers (#579)

## [1.5.5] - 2020-09-13

### Changed

 - Bumped CommonMark spec compliance to 0.28.2

### Fixed

 - Fixed `textarea` elements not being treated as a type 1 HTML block (like `script`, `style`, or `pre`)
 - Fixed autolink processor not handling other unmatched trailing parentheses

## [1.5.4] - 2020-08-17

### Fixed

 - Fixed footnote ID configuration not taking effect (#524, #530)
 - Fixed heading permalink slugs not being unique (#531, #534)

## [1.5.3] - 2020-07-19

### Fixed

 - Fixed regression of multi-byte inline parser characters not being matched

## [1.5.2] - 2020-07-19

### Changed

 - Significantly improved performance of the inline parser regex

### Fixed

 - Fixed parent class lookups for non-existent classes on PHP 8 (#517)

## [1.5.1] - 2020-06-27

### Fixed

 - Fixed UTF-8 encoding not being checked in the `UrlEncoder` utility (#509) or the `Cursor`

## [1.5.0] - 2020-06-21

### Added

 - Added new `AttributesExtension` based on <https://github.com/webuni/commonmark-attributes-extension> (#474)
 - Added new `FootnoteExtension` based on <https://github.com/rezozero/commonmark-ext-footnotes> (#474)
 - Added new `MentionExtension` to replace `InlineMentionParser` with more flexibility and customization
 - Added the ability to render `TableOfContents` nodes anywhere in a document (given by a placeholder)
 - Added the ability to properly clone `Node` objects
 - Added options to customize the value of `rel` attributes set via the `ExternalLink` extension (#476)
 - Added a new `heading_permalink/slug_normalizer` configuration option to allow custom slug generation (#460)
 - Added a new `heading_permalink/symbol` configuration option to replace the now deprecated `heading_permalink/inner_contents` configuration option (#505)
 - Added `SlugNormalizer` and `TextNormalizer` classes to make normalization reusable by extensions (#485)
 - Added new classes:
   - `TableOfContentsGenerator`
   - `TableOfContentsGeneratorInterface`
   - `TableOfContentsPlaceholder`
   - `TableOfContentsPlaceholderParser`
   - `TableOfContentsPlaceholderRenderer`

### Changed

 - "Moved" the `TableOfContents` class into a new `Node` sub-namespace (with backward-compatibility)
 - Reference labels are now generated and stored in lower-case instead of upper-case
 - Reference labels are no longer normalized inside the `Reference`, only the `ReferenceMap`

### Fixed

 - Fixed reference label case folding polyfill not being consistent between different PHP versions

### Deprecated

 - Deprecated the `CommonMarkConverter::VERSION` constant (#496)
 - Deprecated `League\CommonMark\Extension\Autolink\InlineMentionParser` (use `League\CommonMark\Extension\Mention\MentionParser` instead)
 - Deprecated everything under `League\CommonMark\Extension\HeadingPermalink\Slug` (use the classes under `League\CommonMark\Normalizer` instead)
 - Deprecated `League\CommonMark\Extension\TableOfContents\TableOfContents` (use the one in the new `Node` sub-namespace instead)
 - Deprecated the `STYLE_` and `NORMALIZE_` constants in `TableOfContentsBuilder` (use the ones in `TableOfContentsGenerator` instead)
 - Deprecated the `\League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkRenderer::DEFAULT_INNER_CONTENTS` constant (#505)
 - Deprecated the `heading_permalink/inner_contents` configuration option in the `HeadingPermalink` extension (use the new `heading_permalink/symbol` configuration option instead) (#505)

## [1.4.3] - 2020-05-04

### Fixed

 - Fixed certain Unicode letters, numbers, and marks not being preserved when generating URL slugs (#467)

## [1.4.2] - 2020-04-24

### Fixed

 - Fixed inline code blocks not be included within heading permalinks (#457)

## [1.4.1] - 2020-04-20

### Fixed

 - Fixed BC break caused by ConverterInterface alias not being used by some DI containers (#454)

## [1.4.0] - 2020-04-18

### Added

 - Added new [Heading Permalink extension](https://commonmark.thephpleague.com/extensions/heading-permalinks/) (#420)
 - Added new [Table of Contents extension](https://commonmark.thephpleague.com/extensions/table-of-contents/) (#441)
 - Added new `MarkdownConverterInterface` as a long-term replacement for `ConverterInterface` (#439)
 - Added new `DocumentPreParsedEvent` event (#427, #359, #399)
 - Added new `ListBlock::TYPE_BULLET` constant as a replacement for `ListBlock::TYPE_UNORDERED`
 - Added new `MarkdownInput` class and `MarkdownInputInterface` to handle pre-parsing and allow listeners to replace Markdown contents

### Changed

 - Block & inline renderers will now render child classes automatically (#222, #209)
 - The `ListBlock` constants now use fully-lowercased values instead of titlecased values
 - Significantly improved typing

### Fixed

 - Fixed loose comparison when checking for table alignment
 - Fixed `StaggeredDelimiterProcessor` returning from a `void` function

### Deprecated

 - The `Converter` class has been deprecated; use `CommonMarkConverter` instead (#438, #439)
 - The `ConverterInterface` has been deprecated; use `MarkdownConverterInterface` instead (#438, #439)
 - The `bin/commonmark` script has been deprecated
 - The following methods of `ArrayCollection` have been deprecated:
   - `add()`
   - `set()`
   - `get()`
   - `remove()`
   - `isEmpty()`
   - `contains()`
   - `indexOf()`
   - `containsKey()`
   - `replaceWith()`
   - `removeGaps()`
 - The `ListBlock::TYPE_UNORDERED` constant has been deprecated, use `ListBlock::TYPE_BULLET` instead

## [1.3.4] - 2020-04-13

### Fixed

 - Fixed configuration/environment not being injected into event listeners when adding them via `[$instance, 'method']` callable syntax (#440)

## [1.3.3] - 2020-04-05

### Fixed

 - Fixed event listeners not having the environment or configuration injected if they implemented the `EnvironmentAwareInterface` or `ConfigurationAwareInterface` (#423)

## [1.3.2] - 2020-03-25

### Fixed

 - Optimized URL normalization in cases where URLs don't contain special characters (#417, #418)

## [1.3.1] - 2020-02-28

### Fixed

 - Fixed return types of `Environment::createCommonMarkEnvironment()` and `Environment::createGFMEnvironment()`

## [1.3.0] - 2020-02-08

### Added

 - Added (optional) **full GFM support!** 🎉🎉🎉 (#409)
 - Added check to ensure Markdown input is valid UTF-8 (#401, #405)
 - Added new `unordered_list_markers` configuration option (#408, #411)

### Changed

 - Introduced several micro-optimizations for a 5-10% performance boost

## [1.2.2] - 2020-01-15

This release contains the same changes as 1.1.3:

### Fixed

 - Fixed link parsing edge case (#403)

## [1.1.3] - 2020-01-15

### Fixed

 - Fixed link parsing edge case (#403)

## [1.2.1] - 2020-01-14

### Changed

 - Introduced several micro-optimizations, reducing the parse time by 8%

## [1.2.0] - 2020-01-09

### Changed

 - Removed URL decoding step before encoding (more performant and better matches the JS library)
 - Removed redundant token from HTML tag regex

## [1.1.2] - 2019-12-09

### Fixed

 - Fixed URL normalization not handling non-UTF-8 sequences properly (#395, #396)

## [1.1.1] - 2019-11-11

### Fixed

 - Fixed handling of link destinations with unbalanced unescaped parens
 - Fixed adding delimiters to stack which can neither open nor close a run

## [1.1.0] - 2019-10-31

### Added

 - Added a new `Html5EntityDecoder` class (#387)

### Changed

 - Improved performance by 10% (#389)
 - Made entity decoding less memory-intensive (#386, #387)

### Fixed

 - Fixed PHP 7.4 compatibility issues

### Deprecated

 - Deprecated the `Html5Entities` class - use `Html5EntityDecoder` instead (#387)

## [1.0.0] - 2019-06-29

No changes were made since 1.0.0-rc1.

## [1.0.0-rc1] - 2019-06-19

### Added

 - Extracted a `ReferenceMapInterface` from the `ReferenceMap` class
 - Added optional `ReferenceMapInterface` parameter to the `Document` constructor

### Changed

 - Replaced all references to `ReferenceMap` with `ReferenceMapInterface`
 - `ReferenceMap::addReference()` no longer returns `$this`

### Fixed

 - Fixed bug where elements with content of `"0"` wouldn't be rendered (#376)

## [1.0.0-beta4] - 2019-06-05

### Added

 - Added event dispatcher functionality (#359, #372)

### Removed

 - Removed `DocumentProcessorInterface` functionality in favor of event dispatching (#373)

## [1.0.0-beta3] - 2019-05-27

### Changed

 - Made the `Delimiter` class final and extracted a new `DelimiterInterface`
   - Modified most external usages to use this new interface
 - Renamed three `Delimiter` methods:
   - `getOrigDelims()` renamed to `getOriginalLength()`
   - `getNumDelims()` renamed to `getLength()`
   - `setNumDelims()` renamed to `setLength()`
 - Made additional classes final:
   - `DelimiterStack`
   - `ReferenceMap`
   - `ReferenceParser`
 - Moved `ReferenceParser` into the `Reference` sub-namespace

### Removed

 - Removed unused `Delimiter` methods:
   - `setCanOpen()`
   - `setCanClose()`
   - `setChar()`
   - `setIndex()`
   - `setInlineNode()`
 - Removed fluent interface from `Delimiter` (setter methods now have no return values)

## [1.0.0-beta2] - 2019-05-27

### Changed

 - `DelimiterProcessorInterface::process()` will accept any type of `AbstractStringContainer` now, not just `Text` nodes
 - The `Delimiter` constructor, `getInlineNode()`, and `setInlineNode()` no longer accept generic `Node` elements - only `AbstractStringContainer`s


### Removed

 - Removed all deprecated functionality:
   - The `safe` option (use `html_input` and `allow_unsafe_links` options instead)
   - All deprecated `RegexHelper` constants
   - `DocParser::getEnvironment()` (you should obtain it some other way)
   - `AbstractInlineContainer` (use `AbstractInline` instead and make `isContainer()` return `true`)

## [1.0.0-beta1] - 2019-05-26

### Added

 - Added proper support for delimiters, including custom delimiters
   - `addDelimiterProcessor()` added to `ConfigurableEnvironmentInterface` and `Environment`
 - Basic delimiters no longer need custom parsers - they'll be parsed automatically
 - Added new methods:
   - `AdjacentTextMerger::mergeTextNodesBetweenExclusive()`
   - `CommonMarkConveter::getEnvironment()`
   - `Configuration::set()`
 - Extracted some new interfaces from base classes:
   - `DocParserInterface` created from `DocParser`
   - `ConfigurationInterface` created from `Configuration`
   - `ReferenceInterface` created from `Reference`

### Changed

 - Renamed several methods of the `Configuration` class:
   - `getConfig()` renamed to `get()`
   - `mergeConfig()` renamed to `merge()`
   - `setConfig()` renamed to `replace()`
 - Changed `ConfigurationAwareInterface::setConfiguration()` to accept the new `ConfigurationInterface` instead of the concrete class
 - Renamed the `AdjoiningTextCollapser` class to `AdjacentTextMerger`
   - Replaced its `collapseTextNodes()` method with the new `mergeChildNodes()` method
 - Made several classes `final`:
   - `Configuration`
   - `DocParser`
   - `HtmlRenderer`
   - `InlineParserEngine`
   - `NodeWalker`
   - `Reference`
   - All of the block/inline parsers and renderers
 - Reduced visibility of several internal methods to `private`:
    - `DelimiterStack::findEarliest()`
    - All `protected` methods in `InlineParserEngine`
 - Marked some classes and methods as `@internal`
 - `ElementRendererInterface` now requires a public `renderInline()` method; added this to `HtmlRenderer`
 - Changed `InlineParserEngine::parse()` to require an `AbstractStringContainerBlock` instead of the generic `Node` class
 - Un-deprecated the `CommonmarkConverter::VERSION` constant
 - The `Converter` constructor now requires an instance of `DocParserInterface` instead of the concrete `DocParser`
 - Changed `Emphasis`, `Strong`, and `AbstractWebResource` to directly extend `AbstractInline` instead of the (now-deprecated) intermediary `AbstractInlineContainer` class

### Fixed

 - Fixed null errors when inserting sibling `Node`s without parents
 - Fixed `NodeWalkerEvent` not requiring a `Node` via its constructor
 - Fixed `Reference::normalizeReference()` improperly converting to uppercase instead of performing proper Unicode case-folding
 - Fixed strong emphasis delimiters not being preserved when `enable_strong` is set to `false` (it now works identically to `enable_em`)

### Deprecated

 - Deprecated `DocParser::getEnvironment()` (you should obtain it some other way)
 - Deprecated `AbstractInlineContainer` (use `AbstractInline` instead and make `isContainer()` return `true`)

### Removed

 - Removed inline processor functionality now that we have proper delimiter support:
   - Removed `addInlineProcessor()` from `ConfigurableEnvironmentInterface` and `Environment`
   - Removed `getInlineProcessors()` from `EnvironmentInterface` and `Environment`
   - Removed `EmphasisProcessor`
   - Removed `InlineProcessorInterface`
 - Removed `EmphasisParser` now that we have proper delimiter support
 - Removed support for non-UTF-8-compatible encodings
    - Removed `getEncoding()` from `ContextInterface`
    - Removed `getEncoding()`, `setEncoding()`, and `$encoding` from `Context`
    - Removed `getEncoding()` and the second `$encoding` constructor param from `Cursor`
 - Removed now-unused methods
   - Removed `DelimiterStack::getTop()` (no replacement)
   - Removed `DelimiterStack::iterateByCharacters()` (use the new `processDelimiters()` method instead)
   - Removed the protected `DelimiterStack::findMatchingOpener()` method

[unreleased]: https://github.com/thephpleague/commonmark/compare/1.6.6...1.6
[1.6.6]: https://github.com/thephpleague/commonmark/compare/1.6.5...1.6.6
[1.6.5]: https://github.com/thephpleague/commonmark/compare/1.6.4...1.6.5
[1.6.4]: https://github.com/thephpleague/commonmark/compare/1.6.3...1.6.4
[1.6.3]: https://github.com/thephpleague/commonmark/compare/1.6.2...1.6.3
[1.6.2]: https://github.com/thephpleague/commonmark/compare/1.6.1...1.6.2
[1.6.1]: https://github.com/thephpleague/commonmark/compare/1.6.0...1.6.1
[1.6.0]: https://github.com/thephpleague/commonmark/compare/1.5.8...1.6.0
[1.5.8]: https://github.com/thephpleague/commonmark/compare/1.5.7...1.5.8
[1.5.7]: https://github.com/thephpleague/commonmark/compare/1.5.6...1.5.7
[1.5.6]: https://github.com/thephpleague/commonmark/compare/1.5.5...1.5.6
[1.5.5]: https://github.com/thephpleague/commonmark/compare/1.5.4...1.5.5
[1.5.4]: https://github.com/thephpleague/commonmark/compare/1.5.3...1.5.4
[1.5.3]: https://github.com/thephpleague/commonmark/compare/1.5.2...1.5.3
[1.5.2]: https://github.com/thephpleague/commonmark/compare/1.5.1...1.5.2
[1.5.1]: https://github.com/thephpleague/commonmark/compare/1.5.0...1.5.1
[1.5.0]: https://github.com/thephpleague/commonmark/compare/1.4.3...1.5.0
[1.4.3]: https://github.com/thephpleague/commonmark/compare/1.4.2...1.4.3
[1.4.2]: https://github.com/thephpleague/commonmark/compare/1.4.1...1.4.2
[1.4.1]: https://github.com/thephpleague/commonmark/compare/1.4.0...1.4.1
[1.4.0]: https://github.com/thephpleague/commonmark/compare/1.3.4...1.4.0
[1.3.4]: https://github.com/thephpleague/commonmark/compare/1.3.3...1.3.4
[1.3.3]: https://github.com/thephpleague/commonmark/compare/1.3.2...1.3.3
[1.3.2]: https://github.com/thephpleague/commonmark/compare/1.3.1...1.3.2
[1.3.1]: https://github.com/thephpleague/commonmark/compare/1.3.0...1.3.1
[1.3.0]: https://github.com/thephpleague/commonmark/compare/1.2.2...1.3.0
[1.2.2]: https://github.com/thephpleague/commonmark/compare/1.2.1...1.2.2
[1.2.1]: https://github.com/thephpleague/commonmark/compare/1.2.0...1.2.1
[1.2.0]: https://github.com/thephpleague/commonmark/compare/1.1.2...1.2.0
[1.1.3]: https://github.com/thephpleague/commonmark/compare/1.1.2...1.1.3
[1.1.2]: https://github.com/thephpleague/commonmark/compare/1.1.1...1.1.2
[1.1.1]: https://github.com/thephpleague/commonmark/compare/1.1.0...1.1.1
[1.1.0]: https://github.com/thephpleague/commonmark/compare/1.0.0...1.1.0
[1.0.0]: https://github.com/thephpleague/commonmark/compare/1.0.0-rc1...1.0.0
[1.0.0-rc1]: https://github.com/thephpleague/commonmark/compare/1.0.0-beta4...1.0.0-rc1
[1.0.0-beta4]: https://github.com/thephpleague/commonmark/compare/1.0.0-beta3...1.0.0-beta4
[1.0.0-beta3]: https://github.com/thephpleague/commonmark/compare/1.0.0-beta2...1.0.0-beta3
[1.0.0-beta2]: https://github.com/thephpleague/commonmark/compare/1.0.0-beta1...1.0.0-beta2
[1.0.0-beta1]: https://github.com/thephpleague/commonmark/compare/0.19.2...1.0.0-beta1
=======
**Upgrading from 1.x?** See <https://commonmark.thephpleague.com/2.0/upgrading/> for additional information.

## [Unreleased][unreleased]

## [2.1.1] - 2022-01-02

### Added

 - Added missing return type to `Environment::dispatch()` to fix deprecation warning (#778)

## [2.1.0] - 2021-12-05

### Added

- Added support for ext-yaml in FrontMatterExtension (#715)
- Added support for symfony/yaml v6.0 in FrontMatterExtension (#739)
- Added new `heading_permalink/aria_hidden` config option (#741)

### Fixed

 - Fixed PHP 8.1 deprecation warning (#759, #762)

## [2.0.2] - 2021-08-14

### Changed

- Bumped minimum version of league/config to support PHP 8.1

### Fixed

- Fixed ability to register block parsers that identify lines starting with letters (#706)

## [2.0.1] - 2021-07-31

### Fixed

- Fixed nested autolinks (#689)
- Fixed description lists being parsed incorrectly (#692)
- Fixed Table of Contents not respecting Heading Permalink prefixes (#690)

## [2.0.0] - 2021-07-24

No changes were introduced since the previous RC2 release.
See all entries below for a list of changes between 1.x and 2.0.

## [2.0.0-rc2] - 2021-07-17

### Fixed

- Fixed Mentions inside of links creating nested links against the spec's rules (#688)

## [2.0.0-rc1] - 2021-07-10

No changes were introduced since the previous release.

## [2.0.0-beta3] - 2021-07-03

### Changed

 - Any leading UTF-8 BOM will be stripped from the input
 - The `getEnvironment()` method of `CommonMarkConverter` and `GithubFlavoredMarkdownConverter` will always return the concrete, configurable `Environment` for upgrading convenience
 - Optimized AST iteration
 - Lots of small micro-optimizations

## [2.0.0-beta2] - 2021-06-27

### Added

- Added new `Node::iterator()` method and `NodeIterator` class for faster AST iteration (#683, #684)

### Changed

- Made compatible with CommonMark spec 0.30.0
- Optimized link label parsing
- Optimized AST iteration for a 50% performance boost in some event listeners (#683, #684)

### Fixed

- Fixed processing instructions with EOLs
- Fixed case-insensitive matching for HTML tag types
- Fixed type 7 HTML blocks incorrectly interrupting lazy paragraphs
- Fixed newlines in reference labels not collapsing into spaces
- Fixed link label normalization with escaped newlines
- Fixed unnecessary AST iteration when no default attributes are configured

## [2.0.0-beta1] - 2021-06-20

### Added

 - **Added three new extensions:**
   - `FrontMatterExtension` ([see documentation](https://commonmark.thephpleague.com/extensions/front-matter/))
   - `DescriptionListExtension` ([see documentation](https://commonmark.thephpleague.com/extensions/description-lists/))
   - `DefaultAttributesExtension` ([see documentation](https://commonmark.thephpleague.com/extensions/default-attributes/))
 - **Added new `XmlRenderer` to simplify AST debugging** ([see documentation](https://commonmark.thephpleague.com/xml/)) (#431)
 - **Added the ability to configure disallowed raw HTML tags** (#507)
 - **Added the ability for Mentions to use multiple characters for their symbol** (#514, #550)
 - **Added the ability to delegate event dispatching to PSR-14 compliant event dispatcher libraries**
 - **Added new configuration options:**
   - Added `heading_permalink/min_heading_level` and `heading_permalink/max_heading_level` options to control which headings get permalinks (#519)
   - Added `heading_permalink/fragment_prefix` to allow customizing the URL fragment prefix (#602)
   - Added `footnote/backref_symbol` option for customizing backreference link appearance (#522)
   - Added `slug_normalizer/max_length` option to control the maximum length of generated URL slugs
   - Added `slug_normalizer/unique` option to control whether unique slugs should be generated per-document or per-environment
 - **Added purity markers throughout the codebase** (verified with Psalm)
 - Added `Query` class to simplify Node traversal when looking to take action on certain Nodes
 - Added new `HtmlFilter` and `StringContainerHelper` utility classes
 - Added new `AbstractBlockContinueParser` class to simplify the creation of custom block parsers
 - Added several new classes and interfaces:
   - `BlockContinue`
   - `BlockContinueParserInterface`
   - `BlockContinueParserWithInlinesInterface`
   - `BlockStart`
   - `BlockStartParserInterface`
   - `ChildNodeRendererInterface`
   - `ConfigurableExtensionInterface`
   - `CursorState`
   - `DashParser` (extracted from `PunctuationParser`)
   - `DelimiterParser`
   - `DocumentBlockParser`
   - `DocumentPreRenderEvent`
   - `DocumentRenderedEvent`
   - `EllipsesParser` (extracted from `PunctuationParser`)
   - `ExpressionInterface`
   - `FallbackNodeXmlRenderer`
   - `InlineParserEngineInterface`
   - `InlineParserMatch`
   - `MarkdownParserState`
   - `MarkdownParserStateInterface`
   - `MarkdownRendererInterface`
   - `Query`
   - `RawMarkupContainerInterface`
   - `ReferenceableInterface`
   - `RenderedContent`
   - `RenderedContentInterface`
   - `ReplaceUnpairedQuotesListener`
   - `SpecReader`
   - `TableOfContentsRenderer`
   - `UniqueSlugNormalizer`
   - `UniqueSlugNormalizerInterface`
   - `XmlRenderer`
   - `XmlNodeRendererInterface`
 - Added several new methods:
   - `Cursor::getCurrentCharacter()`
   - `Environment::createDefaultConfiguration()`
   - `Environment::setEventDispatcher()`
   - `EnvironmentInterface::getExtensions()`
   - `EnvironmentInterface::getInlineParsers()`
   - `EnvironmentInterface::getSlugNormalizer()`
   - `FencedCode::setInfo()`
   - `Heading::setLevel()`
   - `HtmlRenderer::renderDocument()`
   - `InlineParserContext::getFullMatch()`
   - `InlineParserContext::getFullMatchLength()`
   - `InlineParserContext::getMatches()`
   - `InlineParserContext::getSubMatches()`
   - `LinkParserHelper::parsePartialLinkLabel()`
   - `LinkParserHelper::parsePartialLinkTitle()`
   - `Node::assertInstanceOf()`
   - `RegexHelper::isLetter()`
   - `StringContainerInterface::setLiteral()`
   - `TableCell::getType()`
   - `TableCell::setType()`
   - `TableCell::getAlign()`
   - `TableCell::setAlign()`

### Changed

 - **Changed the converter return type**
   - `CommonMarkConverter::convertToHtml()` now returns an instance of `RenderedContentInterface`. This can be cast to a string for backward compatibility with 1.x.
 - **Table of Contents items are no longer wrapped with `<p>` tags** (#613)
 - **Heading Permalinks now link to element IDs instead of using `name` attributes** (#602)
 - **Heading Permalink IDs and URL fragments now have a `content` prefix by default** (#602)
 - **Changes to configuration options:**
     - `enable_em` has been renamed to `commonmark/enable_em`
     - `enable_strong` has been renamed to `commonmark/enable_strong`
     - `use_asterisk` has been renamed to `commonmark/use_asterisk`
     - `use_underscore` has been renamed to `commonmark/use_underscore`
     - `unordered_list_markers` has been renamed to `commonmark/unordered_list_markers`
     - `mentions/*/symbol` has been renamed to `mentions/*/prefix`
     - `mentions/*/regex` has been renamed to `mentions/*/pattern` and requires partial regular expressions (without delimiters or flags)
     - `max_nesting_level` now defaults to `PHP_INT_MAX` and no longer supports floats
     - `heading_permalink/slug_normalizer` has been renamed to `slug_normalizer/instance`
 - **Event dispatching is now fully PSR-14 compliant**
 - **Moved and renamed several classes** - [see the full list here](https://commonmark.thephpleague.com/2.0/upgrading/#classesnamespaces-renamed)
 - The `HeadingPermalinkExtension` and `FootnoteExtension` were modified to ensure they never produce a slug which conflicts with slugs created by the other extension
 - `SlugNormalizer::normalizer()` now supports optional prefixes and max length options passed in via the `$context` argument
 - The `AbstractBlock::$data` and `AbstractInline::$data` arrays were replaced with a `Data` array-like object on the base `Node` class
 - **Implemented a new approach to block parsing.** This was a massive change, so here are the highlights:
   - Functionality previously found in block parsers and node elements has moved to block parser factories and block parsers, respectively ([more details](https://commonmark.thephpleague.com/2.0/upgrading/#new-block-parsing-approach))
   - `ConfigurableEnvironmentInterface::addBlockParser()` is now `EnvironmentBuilderInterface::addBlockParserFactory()`
   - `ReferenceParser` was re-implemented and works completely different than before
   - The paragraph parser no longer needs to be added manually to the environment
 - **Implemented a new approach to inline parsing** where parsers can now specify longer strings or regular expressions they want to parse (instead of just single characters):
   - `InlineParserInterface::getCharacters()` is now `getMatchDefinition()` and returns an instance of `InlineParserMatch`
   - `InlineParserContext::__construct()` now requires the contents to be provided as a `Cursor` instead of a `string`
 - **Implemented delimiter parsing as a special type of inline parser** (via the new `DelimiterParser` class)
 - **Changed block and inline rendering to use common methods and interfaces**
   - `BlockRendererInterface` and `InlineRendererInterface` were replaced by `NodeRendererInterface` with slightly different parameters. All core renderers now implement this interface.
   - `ConfigurableEnvironmentInterface::addBlockRenderer()` and `addInlineRenderer()` were combined into `EnvironmentBuilderInterface::addRenderer()`
   - `EnvironmentInterface::getBlockRenderersForClass()` and `getInlineRenderersForClass()` are now just `getRenderersForClass()`
 - **Completely refactored the Configuration implementation**
   - All configuration-specific classes have been moved into a new `league/config` package with a new namespace
   - `Configuration` objects must now be configured with a schema and all options must match that schema - arbitrary keys are no longer permitted
   - `Configuration::__construct()` no longer accepts the default configuration values - use `Configuration::merge()` instead
   - `ConfigurationInterface` now only contains a `get(string $key)`; this method no longer allows arbitrary default values to be returned if the option is missing
   - `ConfigurableEnvironmentInterface` was renamed to `EnvironmentBuilderInterface`
   - `ExtensionInterface::register()` now requires an `EnvironmentBuilderInterface` param instead of `ConfigurableEnvironmentInterface`
 - **Added missing return types to virtually every class and interface method**
 - Re-implemented the GFM Autolink extension using the new inline parser approach instead of document processors
   - `EmailAutolinkProcessor` is now `EmailAutolinkParser`
   - `UrlAutolinkProcessor` is now `UrlAutolinkParser`
 - `HtmlElement` can now properly handle array (i.e. `class`) and boolean (i.e. `checked`) attribute values
 - `HtmlElement` automatically flattens any attributes with array values into space-separated strings, removing duplicate entries
 - Combined separate classes/interfaces into one:
   - `DisallowedRawHtmlRenderer` replaces `DisallowedRawHtmlBlockRenderer` and `DisallowedRawHtmlInlineRenderer`
   - `NodeRendererInterface` replaces `BlockRendererInterface` and `InlineRendererInterface`
 - Renamed the following methods:
   - `Environment` and `ConfigurableEnvironmentInterface`:
     - `addBlockParser()` is now `addBlockStartParser()`
   - `ReferenceMap` and `ReferenceMapInterface`:
     - `addReference()` is now `add()`
     - `getReference()` is now `get()`
     - `listReferences()` is now `getIterator()`
   - Various node (block/inline) classes:
     - `getContent()` is now `getLiteral()`
     - `setContent()` is now `setLiteral()`
 - Moved and renamed the following constants:
   - `EnvironmentInterface::HTML_INPUT_ALLOW` is now `HtmlFilter::ALLOW`
   - `EnvironmentInterface::HTML_INPUT_ESCAPE` is now `HtmlFilter::ESCAPE`
   - `EnvironmentInterface::HTML_INPUT_STRIP` is now `HtmlFilter::STRIP`
   - `TableCell::TYPE_HEAD` is now `TableCell::TYPE_HEADER`
   - `TableCell::TYPE_BODY` is now `TableCell::TYPE_DATA`
 - Changed the visibility of the following properties:
   - `AttributesInline::$attributes` is now `private`
   - `AttributesInline::$block` is now `private`
   - `TableCell::$align` is now `private`
   - `TableCell::$type` is now `private`
   - `TableSection::$type` is now `private`
 - Several methods which previously returned `$this` now return `void`
   - `Delimiter::setPrevious()`
   - `Node::replaceChildren()`
   - `Context::setTip()`
   - `Context::setContainer()`
   - `Context::setBlocksParsed()`
   - `AbstractStringContainer::setContent()`
   - `AbstractWebResource::setUrl()`
 - Several classes are now marked `final`:
   - `ArrayCollection`
   - `Emphasis`
   - `FencedCode`
   - `Heading`
   - `HtmlBlock`
   - `HtmlElement`
   - `HtmlInline`
   - `IndentedCode`
   - `Newline`
   - `Strikethrough`
   - `Strong`
   - `Text`
 - `Heading` nodes no longer directly contain a copy of their inner text
 - `StringContainerInterface` can now be used for inlines, not just blocks
 - `ArrayCollection` only supports integer keys
 - `HtmlElement` now implements `Stringable`
 - `Cursor::saveState()` and `Cursor::restoreState()` now use `CursorState` objects instead of arrays
 - `NodeWalker::next()` now enters, traverses any children, and leaves all elements which may have children (basically all blocks plus any inlines with children). Previously, it only did this for elements explicitly marked as "containers".
 - `InvalidOptionException` was removed
 - Anything with a `getReference(): ReferenceInterface` method now implements `ReferencableInterface`
 - The `SmartPunct` extension now replaces all unpaired `Quote` elements with `Text` elements towards the end of parsing, making the `QuoteRenderer` unnecessary
 - Several changes made to the Footnote extension:
   - Footnote identifiers can no longer contain spaces
   - Anonymous footnotes can now span subsequent lines
   - Footnotes can now contain multiple lines of content, including sub-blocks, by indenting them
   - Footnote event listeners now have numbered priorities (but still execute in the same order)
   - Footnotes must now be separated from previous content by a blank line
 - The line numbers (keys) returned via `MarkdownInput::getLines()` now start at 1 instead of 0
 - `DelimiterProcessorCollectionInterface` now extends `Countable`
 - `RegexHelper::PARTIAL_` constants must always be used in case-insensitive contexts
 - `HeadingPermalinkProcessor` no longer accepts text normalizers via the constructor - these must be provided via configuration instead
 - Blocks which can't contain inlines will no longer be asked to render inlines
 - `AnonymousFootnoteRefParser` and `HeadingPermalinkProcessor` now implement `EnvironmentAwareInterface` instead of `ConfigurationAwareInterface`
 - The second argument to `TextNormalizerInterface::normalize()` must now be an array
 - The `title` attribute for `Link` and `Image` nodes is now stored using a dedicated property instead of stashing it in `$data`
 - `ListData::$delimiter` now returns either `ListBlock::DELIM_PERIOD` or `ListBlock::DELIM_PAREN` instead of the literal delimiter

### Fixed

 - **Fixed parsing of footnotes without content**
 - **Fixed rendering of orphaned footnotes and footnote refs**
 - **Fixed some URL autolinks breaking too early** (#492)
 - Fixed `AbstractStringContainer` not actually being `abstract`

### Removed

 - **Removed support for PHP 7.1, 7.2, and 7.3** (#625, #671)
 - **Removed all previously-deprecated functionality:**
   - Removed the ability to pass custom `Environment` instances into the `CommonMarkConverter` and `GithubFlavoredMarkdownConverter` constructors
   - Removed the `Converter` class and `ConverterInterface`
   - Removed the `bin/commonmark` script
   - Removed the `Html5Entities` utility class
   - Removed the `InlineMentionParser` (use `MentionParser` instead)
   - Removed `DefaultSlugGenerator` and `SlugGeneratorInterface` from the `Extension/HeadingPermalink/Slug` sub-namespace (use the new ones under `./SlugGenerator` instead)
   - Removed the following `ArrayCollection` methods:
     - `add()`
     - `set()`
     - `get()`
     - `remove()`
     - `isEmpty()`
     - `contains()`
     - `indexOf()`
     - `containsKey()`
     - `replaceWith()`
     - `removeGaps()`
   - Removed the `ConfigurableEnvironmentInterface::setConfig()` method
   - Removed the `ListBlock::TYPE_UNORDERED` constant
   - Removed the `CommonMarkConverter::VERSION` constant
   - Removed the `HeadingPermalinkRenderer::DEFAULT_INNER_CONTENTS` constant
   - Removed the `heading_permalink/inner_contents` configuration option
 - **Removed now-unused classes:**
   - `AbstractStringContainerBlock`
   - `BlockRendererInterface`
   - `Context`
   - `ContextInterface`
   - `Converter`
   - `ConverterInterface`
   - `InlineRendererInterface`
   - `PunctuationParser` (was split into two classes: `DashParser` and `EllipsesParser`)
   - `QuoteRenderer`
   - `UnmatchedBlockCloser`
 - Removed the following methods, properties, and constants:
   - `AbstractBlock::$open`
   - `AbstractBlock::$lastLineBlank`
   - `AbstractBlock::isContainer()`
   - `AbstractBlock::canContain()`
   - `AbstractBlock::isCode()`
   - `AbstractBlock::matchesNextLine()`
   - `AbstractBlock::endsWithBlankLine()`
   - `AbstractBlock::setLastLineBlank()`
   - `AbstractBlock::shouldLastLineBeBlank()`
   - `AbstractBlock::isOpen()`
   - `AbstractBlock::finalize()`
   - `AbstractBlock::getData()`
   - `AbstractInline::getData()`
   - `ConfigurableEnvironmentInterface::addBlockParser()`
   - `ConfigurableEnvironmentInterface::mergeConfig()`
   - `Delimiter::setCanClose()`
   - `EnvironmentInterface::getConfig()`
   - `EnvironmentInterface::getInlineParsersForCharacter()`
   - `EnvironmentInterface::getInlineParserCharacterRegex()`
   - `HtmlRenderer::renderBlock()`
   - `HtmlRenderer::renderBlocks()`
   - `HtmlRenderer::renderInline()`
   - `HtmlRenderer::renderInlines()`
   - `Node::isContainer()`
   - `RegexHelper::matchAll()` (use the new `matchFirst()` method instead)
   - `RegexHelper::REGEX_WHITESPACE`
 - Removed the second `$contents` argument from the `Heading` constructor

### Deprecated

**The following things have been deprecated and will not be supported in v3.0:**

 - `Environment::mergeConfig()` (set configuration before instantiation instead)
 - `Environment::createCommonMarkEnvironment()` and `Environment::createGFMEnvironment()`
    - Alternative 1: Use `CommonMarkConverter` or `GithubFlavoredMarkdownConverter` if you don't need to customize the environment
    - Alternative 2: Instantiate a new `Environment` and add the necessary extensions yourself

[unreleased]: https://github.com/thephpleague/commonmark/compare/2.1.1...main
[2.1.1]: https://github.com/thephpleague/commonmark/compare/2.0.2...2.1.1
[2.1.0]: https://github.com/thephpleague/commonmark/compare/2.0.2...2.1.0
[2.0.2]: https://github.com/thephpleague/commonmark/compare/2.0.1...2.0.2
[2.0.1]: https://github.com/thephpleague/commonmark/compare/2.0.0...2.0.1
[2.0.0]: https://github.com/thephpleague/commonmark/compare/2.0.0-rc2...2.0.0
[2.0.0-rc2]: https://github.com/thephpleague/commonmark/compare/2.0.0-rc1...2.0.0-rc2
[2.0.0-rc1]: https://github.com/thephpleague/commonmark/compare/2.0.0-beta3...2.0.0-rc1
[2.0.0-beta3]: https://github.com/thephpleague/commonmark/compare/2.0.0-beta2...2.0.0-beta3
[2.0.0-beta2]: https://github.com/thephpleague/commonmark/compare/2.0.0-beta1...2.0.0-beta2
[2.0.0-beta1]: https://github.com/thephpleague/commonmark/compare/1.6...2.0.0-beta1
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
