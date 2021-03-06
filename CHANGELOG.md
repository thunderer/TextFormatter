0.7.1 (2016-09-24)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/64c95e0c84183a46a9bffaa85bea546671b85b21...3c2ff8143055f7998d1cdab428157eaa67a44645)

### Added

 - `3c2ff81` Added Autovideo plugin
 - `8608895` Autoimage: added support for fallback link via Autolink
 - `ca3cc4e` MediaEmbed: added Steam store
 - `64bc419` MediaEmbed: added support for fallback link via Autolink
 - `2a7b9ff` MediaEmbed: added support for uppercase scheme

### Fixed

 - `0693ad7` BuiltInFilters.js: fixed unchecked access to undefined var
 - `dfa0e66` HTMLElements: fixed exception's message
 - `ba79789` TemplateForensics: fixed allowsChildElements() on a template with no xsl:apply-templates element
 - `8371057` Utils: fixed an issue with removeFormatting() where some tags were skipped

### Changed

 - `411f753` Autolink: excluded fullwidth and halfwidth punctuation from links
 - `02360fa` Emoji: simplified UTF-8 to codepoint algorithm
 - `a0a2546` Emoji: store hexadecimal codepoints padded to 4 characters
 - `31b88d0` Emoji: updated JavaScript regexp. No functional change
 - `b3b9e7b` EnforceContentModels: allow for some fallback content in templates with no xsl:apply-templates element
 - `f1fb0c3` HTMLElements: updated the list of URL attributes
 - `7f67345` MediaEmbed: updated Amazon
 - `9388645` RegexpConvertor: updated Unicode properties
 - `2023bfb` Replaced the default behaviour on duplicates in AttributeCollection, BBCodeCollection, EmoticonCollection and TagCollection
 - `e66f291` TemplateForensics: updated specs to HTML 5.1
 - `2c8bbf0` Utils: simplified the UTF-8 to codepoint algorithm


0.7.0 (2016-09-12)
==================

**⚠️ This release contains API changes. See [docs/Internals/API_changes.md](http://s9etextformatter.readthedocs.io/Internals/API_changes/#070) for a description. ⚠️**

[Full commit log](https://github.com/s9e/TextFormatter/compare/66605667be735e06ccbdf2b14c344c2b8bb84100...7cd1dfea62d9d35a40c206997e266918b9f1dfa1)

### Added

 - `7cd1dfe` Emoji: added support for UTR #51 Unicode Emoji, Version 3.0
 - `e1701fd` Forum bundle: added support for emoji
 - `646c85b` JavaScript: added support for urldecode() as a callback
 - `3626b16` MediaEmbed: added support for non-ASCII usernames in Google+

### Changed

 - `f654a16` BBCodes: replaced stripos() calls for performance
 - `3352264` Emoji: made EmojiOne the default image set
 - `aee1add` Emoji: updated path to Twemoji assets
 - `27d1b6b` MediaEmbed: improved support for embeds whose dimensions are fully dynamic
 - `76e4641` MediaEmbed: updated ESPN
 - `8a77784` MediaEmbed: updated Imgur
 - `ce36a47` MediaEmbed: updated TED Talks
 - `f3a0f52` MediaEmbed: updated VK
 - `2fc4807` Parser: improved the performance of out-of-order insertions in the tag stack
 - `4d3b0b0` Parser: simplified out-of-order insertion algorithm
 - `2507bfc` Parser: tweaked addTagPair() to reduce the need for additional sorting
 - `36c544e` Preg: set a higher priority to replacements over default plugins
 - `d0543dd` StylesheetCompressor: improved heuristics
 - `cda5b1f` Tag: setSortPriority() has been deprecated and will emit a warning


0.6.2 (2016-08-09)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/a2d2f3c33695ccabc1c5779abfd44736c592a6c2...6e32a09afa2a1676a81109b6fe31dd63db209e42)

### Added

 - `3d68336` Autoimage: added support for uppercased URLs
 - `c8253c9` BBCodeMonkey: added support for putting BBCode attributes in quotes


0.6.1 (2016-07-30)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/d841d6be7838c25b586a669285c3b03bc185c498...7f3031c419ed748181a123a8b01c6945f2ae821b)

### Fixed

 - `7f3031c` Litedown: fixed catastrophic backtracking when matching inline links/images


0.6.0 (2016-07-29)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/3e76dc3b0ce5acad0860eb3f77dada48f6cfffc1...e3c010a09ae5236ef145e5728b8cdd7665d9dbc2)

### Added

 - `5e6c18a` Litedown: added support for separating blockquotes with two blank lines
 - `636bd77` Litedown: added support for separating lists with two blank lines
 - `d77de85` MediaEmbed: added support for Plays.tv shortlinks

### Removed

 - `bf77ead` BuiltInFilters: removed public access to parseUrl()
 - `39a41bc` Configurator: removed getParser() and getRenderer()
 - `b005a40` Removed the Variant class and related API

### Fixed

 - `915226a` BuiltInFilters: fixed an issue with empty query/fragment in URLs

### Changed

 - `52e41b9` ClosureCompilerService: updated externs
 - `07317a1` Code: ensure that __toString() always returns a string
 - `e3c010a` Code: filterConfig('JS') should return the instance itself to preserve its content from being encoded as a string
 - `d4c9eca` Emoticons: customized exception message to be more meaningful
 - `584562c` Litedown: expanded escaping to include the left parenthesis and single quote
 - `a365537` Litedown: replaced the algorithm handling links and images
 - `ec2f000` Litedown: simplified ignoreEmphasis()
 - `0f533ba` MediaEmbed: updated Scribd
 - `af8ddab` MediaEmbed: updated Straw Poll
 - `78ca63b` MediaEmbed: updated YouTube
 - `2ded572` Moved JS parser loading to PluginBase::getBaseProperties()
 - `0f34747` PluginBase: getBaseProperties() should not return a 'js' element if there is no JS parser
 - `4ecb7f2` Quick renderer: replaced the export() algorithm
 - `fa99034` Regexp: replaced JavaScript-related API
 - `99fbcd1` RegexpConvertor: updated toJS() to return a string rather than an instance of Code


0.5.4 (2016-07-08)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/3122029dcaf12dc95ce584d43fa84ad92ad9619a...96a5a67eb3681b9f89d15dc6affd5896c3d877c6)

### Added

 - `d081f95` Added new rule type: createChild
 - `413fbeb` MediaEmbed: added support for Google Drive links that contain a domain name
 - `bfad6cc` MediaEmbed: added support for JW Platform

### Changed

 - `8a53870` Litedown: suspended escaping inside inline code spans
 - `afbbcd5` MediaEmbed: ignore the hash part of URLs when scraping
 - `2683928` MediaEmbed: updated Hudl
 - `0aff031` MediaEmbed: updated Hudl
 - `38ad33f` MediaEmbed: updated Reddit
 - `41967d0` MediaEmbed: updated SoundCloud
 - `d7526a4` MediaEmbed: updated XboxClips to exclude screenshots
 - `e141f0b` TemplateHelper: refactored some code and reformatted sources
 - `96a5a67` TemplateHelper: remove invalid attributes in loadTemplate()


0.5.3 (2016-06-14)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/4a7bda3e0ecd74b2d67106695ff9d292a0afa2ff...65d80c1ff686489dfc57a29a18bae1edfca9890a)

### Removed

 - `a55119c` Litedown: removed excessive slash stripping from attributes
 - `722763d` Removed unused variable from PHP renderers

### Fixed

 - `7ea7d29` Fixed an issue with newlines in attribute values in Quick rendering
 - `efd1ce3` Litedown: fixed an issue with quote markup inside of multiline attributes

### Changed

 - `65d80c1` Litedown: refactored inline code spans matching
 - `665444d` Parser: output LF characters as HTML entities in attribute values


0.5.2 (2016-06-06)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/702e6fdd6d7874ac25a721173c22435eb03fdc08...c66c9404a0d9ac29bc71d26df0f9c89d31679739)

### Fixed

 - `0c704d7` Litedown: fixed an issue with backticks inside inline code spans
 - `6e536e6` Litedown: fixed an issue with unbalanced inline code markers
 - `c66c940` TemplateHelper: fixed an issue with UTF-8 characters in HTML-to-XML conversion

### Changed

 - `bad5c74` BBCodes: updated Highlight.js to 9.4.0
 - `6e8c811` MediaEmbed: updated Getty Images


0.5.1 (2016-05-22)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/b89e5b2db384a14a164db66871eac2ceab1e2832...253fbb59fbdbf0d664c93128b399fd157e955d7a)

### Added

 - `ff775b7` Emoji: added support for more aliases
 - `b573086` XPathConvertor: added support for less-than and greater-then comparisons

### Fixed

 - `558f34e` JavaScript\Encoder: fixed a potential issue with property names that start with a digit
 - `448e167` RegexpConvertor: fixed an issue with incorrect ranges used for \P properties

### Changed

 - `81106df` Emoji: updated EmojiOne's template to use lowercase filenames
 - `50e85d6` MediaEmbed: prevent division by zero in variable-sized embeds
 - `43acb03` MediaEmbed: updated Facebook
 - `3912aa9` MediaEmbed: updated Getty
 - `253fbb5` MediaEmbed: updated Internet Archive
 - `a579d85` RegexpConvertor: precompute the regexp that matches Unicode properties for performance
 - `e22a808` Updated Tinypic


0.5.0 (2016-04-28)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/efd5915ca5bf74f938fce40c8837d7fc781b642d...fe3dec1725bf870e4437b20e6be0d17652be87ea)

### Added

 - `64f3ee0` Added OL and UL to the Forum bundle
 - `794d664` BBCodes: added OL and UL to the default repository
 - `794127a` MediaEmbed: added NBC Sports
 - `8c6aa1e` MediaEmbed: added The Guardian
 - `7714ae9` MediaEmbed: added Veoh
 - `630ad0a` MediaEmbed: added a background image to YouTube and Twitter

### Removed

 - `c2a3a1c` Litedown: removed support for unquoted titles in links and images

### Fixed

 - `a13416c` Fatdown: fixed missing title in links

### Changed

 - `c032937` Autolink: made ->Autolink->matchWww public
 - `11633f8` Autolink: remove most non-letters at the end of the URL
 - `2a7de09` Autolink: replaced manual check with word boundary assertion
 - `90eaf86` BBCodes: updated Highlight.js to 9.3.0
 - `1608c79` Litedown: made the decodeHtmlEntities property public
 - `94f07bd` MediaEmbed: replaced all HTTP URLs with protocol-relative URLs in src attributes
 - `8b0a31d` MediaEmbed: updated Brightcove
 - `76638c6` MediaEmbed: updated Gfycat
 - `16038df` MediaEmbed: updated Gist
 - `ab22f0b` MediaEmbed: updated VBOX7
 - `b0b717a` MediaEmbed: updated Youku
 - `d9f1608` MediaEmbed: updated dumpert
 - `e49d6c9` OnlineMinifier: instantiate the HTTP client in the constructor
 - `15e3223` OnlineMinifier: renamed HTTP client property
 - `4f10e67` OptimizeChoose: streamlined conditional
 - `c6fd225` TemplateForensics: inspect an element's style to determine whether it's a block-level element


0.4.12 (2016-03-20)
===================

[Full commit log](https://github.com/s9e/TextFormatter/compare/ac3fc397cfbbf1083da75c9df5fcc3eac38fbbfb...acb855967860a9c095cd338f7383c247f88aa928)

### Added

 - `266ccf8` Added support for named parameter 'text' in tag filters
 - `e5d1b85` MediaEmbed: added Brightcove
 - `5c5206c` MediaEmbed: added Healthguru
 - `34a49c1` MediaEmbed: added MRCTV
 - `04d14f1` MediaEmbed: added Video Detective
 - `ae8cc70` MediaEmbed: added support for FORA.tv
 - `9a741c3` MediaEmbed: added support for Livestream short links and old site
 - `bdc62e8` TemplateNormalizations: added SetRelNoreferrerOnTargetedLinks (enabled by default)

### Removed

 - `3b0682f` Litedown: removed support for space in inline links markup

### Fixed

 - `71064bb` Litedown: fixed an issue with Setext headers causing the next line to be ignored

### Changed

 - `f038f28` Litedown: prefix the class name used to identify the language of a code block
 - `7606ab6` Litedown: require code fences' length to match
 - `d2ff237` MediaEmbed: updated Dailymotion
 - `55ca396` MediaEmbed: updated NYTimes


0.4.11 (2016-02-21)
===================

[Full commit log](https://github.com/s9e/TextFormatter/compare/b455eb19d389a67f576ab4cb8e9e25aae0609cb3...ec154ed850e8665afd1df50dc2a11bb78247e178)

### Added

 - `eb234d7` MediaEmbed: added support for LiveCap

### Fixed

 - `7e8fb2a` OptimizeChoose: fixed an issue when removing nested conditionals


0.4.10 (2016-02-11)
===================

[Full commit log](https://github.com/s9e/TextFormatter/compare/98836fa362a0ba24a8a3ff6be1db484067d8d8f2...0eeecb35d9934a454250e367b9eb3e5916494b88)

### Fixed

 - `9ca5270` Parser: fixed an issue with fosterParent and high-priority tags
 - `0eeecb3` Parser: fixed an issue with fosterParent and low-priority tags

### Changed

 - `11bdbe7` BlockElementsFosterFormattingElements: do not create a fosterParent rule if the template is not passthrough
 - `5bb3b77` Parser: adjusted the cost of fixing tags in fosterParent


0.4.9 (2016-02-10)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/350bb8c63660d888e62796567a3b6479f34a68dc...7c279935ae7e3360776dca6c5f512fa320433f6c)

### Added

 - `8a13fb4` RegexpBuilder: added support for non-Unicode strings

### Removed

 - `7bafcde` MediaEmbed: removed support for discontinued Mixcloud short links

### Fixed

 - `9f2b080` Litedown: fixed quote markup interpreted inside of fenced code blocks
 - `e56f871` OptimizeChoose: fixed an issue with node iteration over a live tree

### Changed

 - `09bc408` Http: prefer native stream to cURL if safe mode is on (PHP 5.3 only)
 - `9398ee9` MediaEmbed: updated ComedyCentral
 - `93a6a9b` MediaEmbed: updated Imgur
 - `5de2c70` MediaEmbed: updated Straw Poll
 - `bbabbb9` MediaEmbed: updated Tumblr
 - `5ac0294` Updated externs files for Closure Compiler v20160208


0.4.8 (2016-01-15)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/a7a66e4afae0ccebe729e8ea4b4b60c48bb41dfc...1050f78b5b2ebc4fe09a17b21d49d2d100a4f0ca)

### Added

 - `e98b8a0` Added an HTTP helper with support for cURL and native streams
 - `19ecb28` Added support for customisable timeout in HTTP clients
 - `88562c2` Added support for toggling SSL peer verification in HTTP clients
 - `c4e0a99` ClosureCompilerService: added support for configurable HTTP client
 - `ff15e3a` HostedMinifier: added support for configurable HTTP client
 - `8509ded` MediaEmbed: added Blab
 - `5feeae6` MediaEmbed: added support for HTTP client used for scraping
 - `e2cae50` RemoteCache: added support for configurable HTTP client

### Changed

 - `39139c3` ClosureCompilerService: reorganized code
 - `0c2b5aa` Curl: reset the request body when doing POST requests
 - `48d08f6` MediaEmbed: moved all GitHub iframes to RawGit
 - `c73392e` MediaEmbed: moved hosted iframes back to GitHub
 - `4e55063` MediaEmbed: updated Indiegogo
 - `6444043` Moved Http helper to the Utils namespace
 - `9973077` OnlineMinifier: automatically set timeout in getHttpClient()
 - `ab2c9f1` RemoteCache: updated for new API
 - `b2481cd` Reorganized native HTTP client's code
 - `0489bb8` Set headers unconditionally in native HTTP client


0.4.7 (2016-01-08)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/2b837825cac2da9ddf06867038c19096ffacc4dd...932f6f16738fad1d32e44a96a37347a0aa12635e)

### Added

 - `fd08fc1` Added support for MatthiasMullie\Minify
 - `8eda0fb` JavaScript: added support for converting \x{....} in regexps
 - `932f6f1` Minifiers: added experimental minifiers HostedMinifier and RemoteCache

### Removed

 - `e06bc52` MediaEmbed: removed Rdio

### Changed

 - `2c76bb3` BBCodes: updated Highlight.js to 9.0.0
 - `4be9a3f` ClosureCompilerApplication: cache the binary's hash for performance
 - `b730287` ClosureCompilerApplication: made constructor argument optional
 - `43b9f74` Minifier: use a default constant used as cache differentiator


0.4.6 (2015-12-21)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/4a6c4967cc506397d08053213dc1075d5bca9ec8...4dab11faae6382607c3b12612b274261ba110cc8)

### Added

 - `8e4706d` Added support for negative offsets in NormalizedList
 - `faeafd6` JavaScript: added FirstAvailable minifier
 - `1ec2d62` MediaEmbed: added Plays.tv
 - `853e63b` MediaEmbed: added support for timestamps in Twitch videos

### Fixed

 - `4dab11f` Litedown: fixed incorrect indentation in fenced code blocks

### Changed

 - `8bc9340` Litedown: trim whitespace around the language name in fenced code blocks
 - `19ee41c` Litedown: updated inline code syntax to bring it closer to Markdown's
 - `1f6e375` MediaEmbed: updated Pastebin
 - `299996e` MediaEmbed: updated Twitch to use their new player


0.4.5 (2015-12-04)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/c60a76996bd97733b2fe8ca14289237e43ce94f9...eb8ca6fc21770129b9244f6c544111f64f1a47f8)

### Added

 - `c40350b` Censor: added JavaScript hint
 - `650adb0` Censor: added JavaScript hint
 - `68fe6d6` Emoji: added JavaScript hint
 - `491042c` Emoji: added JavaScript hint
 - `23e84ac` Emoticons: added JavaScript hint
 - `7ec97e6` HTMLElements: added JavaScript hint
 - `5b5a6c4` JavaScript: added support for custom hints set by plugins
 - `fe484da` Litedown: added JavaScript hint for skipping HTML entity decoding
 - `0971ef0` Litedown: added support for decoding HTML entities in attribute values
 - `993f5cc` Preg: added JavaScript hint

### Removed

 - `3484b60` BBCodes: removed duplicate condition

### Fixed

 - `d0b6396` BBCodes: fixed improper pairing during parsing
 - `080d7aa` HTMLElements: fixed detection of empty elements

### Changed

 - `58dd013` HTMLEntities: ignore control characters encoded as HTML entities
 - `ffcdd48` MediaEmbed: replaced protocol-relative iframe URLs from GitHub to use HTTPS
 - `95b72d7` MediaEmbed: updated CNN
 - `ec41c55` MediaEmbed: updated GameTrailers
 - `2209d3c` Updated emoji script
 - `4ce201a` utils.js: cache the element used in html_entity_decode()


0.4.4 (2015-11-15)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/1a6cb0f14f0e368c973976afb7d0ac015c635d80...63dae49a256a8f3f263809c1a3e1f29e2b86a994)

### Added

 - `b6d4c3e` BBCodes: added support for lists that start at an arbitrary number
 - `72d8236` Litedown: added support for empty links
 - `c466adf` Litedown: added support for ordered lists that start at an arbitrary number
 - `54b40b8` Litedown: added support for reference links and images
 - `d26f829` Litedown: added support for single quoted and unquoted titles in links and images
 - `22426da` Litedown: added support for unescaped brackets in link text and image alt text
 - `76c7f6a` MediaEmbed: added support for country-specific Facebook links
 - `58d8541` XPathConvertor: added support for conditions with more than 3 boolean operations

### Fixed

 - `d1ce37e` MediaEmbed: fixed CSS overflow on iOS Safari
 - `10cfa29` XPathConvertor: fixed comparison to 0

### Changed

 - `845279a` Escaper: reverted to using a custom tag
 - `a94a625` MediaEmbed: updated Facebook
 - `13c9015` MediaEmbed: updated Facebook
 - `c742fa7` MediaEmbed: updated Imgur
 - `d7edfed` MediaEmbed: updated Imgur
 - `ff60c99` MediaEmbed: updated Instagram
 - `4e138d7` MediaEmbed: updated Xbox DVR
 - `048e433` MediaEmbed: updated vidme
 - `bb56400` Parser: automatically correct the length of ignore tags
 - `0676a8d` Updated Fatdown


0.4.3 (2015-10-29)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/4ac91c44d353e8fb1b2ce5639a9ee71d92bad27d...d7547abecab3ac9d1b91f5e4c5e15e04883299f1)

### Added

 - `3abcb7d` Bundles: added getCachedParser() and getCachedRenderer()

### Removed

 - `5925a64` MediaEmbed: removed redundant code

### Changed

 - `b0ab098` Emoji: simplified template generation
 - `f624086` Litedown: allow lists to start immediately after a header or horizontal rule
 - `a871f19` Litedown: replaced the way block boundaries are set
 - `3c8c61d` MediaEmbed: updated Comedy Central
 - `ce982d7` MediaEmbed: updated Imgur
 - `df9e944` MediaEmbed: updated Imgur to not transform links to static images
 - `e5c72df` MediaEmbed: updated NPR
 - `cd24826` NormalizedCollection: save items in the lexical order of their keys


0.4.2 (2015-10-04)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/50c790c1bcb80d8ed5a5cb9b81c6a6fbb6a1d0f4...a8d84fb8a2d6150862531ed8622d6c1a64b1fb90)

### Added

 - `73e14ab` BBCodes: ensure that end tags added by lookahead are not duplicated
 - `fd6bd30` Emoji: added draggable="false" to Emoji One images
 - `d32e93d` MediaEmbed: added support for private tracks in SoundCloud
 - `0dd8a61` PHP renderer generator: added support for raw output

### Changed

 - `ce681ae` BBCodes: updated the default CODE definition
 - `627d41c` JavaScript\ConfigOptimizer: do not attempt to deduplicate simple variables
 - `7afa5f9` MediaEmbed: updated wget() to send a User-agent header
 - `31e3b26` TemplateParser: set the escape value of literal text in script elements to "raw"


0.4.1 (2015-09-27)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/15b0005595cc38c76355f376cc5576968db79de6...30ca6acb15a467777f6229bacf4158a8199a38cd)

### Fixed

 - `b6dd56b` MediaEmbed: fixed malformed XSL when an attribute value contains an angle bracket but is not XSL
 - `0d4675c` MediaEmbed: fixed responsive embeds alignment

### Changed

 - `30ca6ac` MediaEmbed: updated Medium
 - `7887f79` MediaEmbed: updated SoundCloud


0.4.0 (2015-09-22)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/5a50dab7662d4083129287bd1c895e2aaf884e9a...5863c4cb5df880d315188b17145410105ba71773)

### Added

 - `7abbe26` Added AVTHelper::toXSL()
 - `5863c4c` Added JavaScript\StylesheetCompressor
 - `257a413` MediaEmbed: added support for Google Drive
 - `a6f99bb` MediaEmbed: added support for multiple-choice templates
 - `82f06e3` TemplateNormalizations: added OptimizeChoose
 - `bc8e764` TemplateNormalizations: added additive identity optimization to FoldArithmeticConstants
 - `9548cee` TemplateNormalizations: added support for decimal values in InlineXPathLiterals
 - `0a6ff7a` TemplateNormalizations: added support for multiplications, divisions and sub expressions in FoldConstants
 - `7a439ff` XPathConvertor: added support for parenthesized math expressions

### Removed

 - `dc8a261` Emoji: removed unnecessary parentheses in JavaScript regexp
 - `edacfa8` MediaEmbed: removed ESPN Deportes
 - `e20df9f` MediaEmbed: removed enableResponsiveEmbeds() and disabledResponsiveEmbeds()
 - `4e7f087` MediaEmbed: removed the embed element from Flash templates
 - `b1500b6` PHP renderer generator: removed constant math evaluation which was made redundant by the FoldArithmeticConstants template normalization pass

### Fixed

 - `9c8eaa0` MediaEmbed: fixed the MEDIA tag filter to not create a tag if it does not match a known site
 - `a5feb09` Quick renderer: fixed a potential issue with string comparison against single quotes
 - `80f2c9a` Quick renderer: fixed incorrect comparison against literals that contain a single quote

### Changed

 - `e1809c3` BBCodes: updated Highlight.js in CODE BBCode
 - `c3f79fb` Censor: do not escape single quotes in Helper::reparse()
 - `050b051` MediaEmbed: overhauled responsive embeds
 - `2ac29f1` MediaEmbed: reorganized filterTag()
 - `5ff9c1e` MediaEmbed: reorganized template generation
 - `7ede2a7` MediaEmbed: updated Audiomack and SoundCloud
 - `1b8956f` MediaEmbed: updated Google Drive
 - `493ac00` MediaEmbed: updated IMDb
 - `455723e` MediaEmbed: updated Imgur
 - `4680bb5` MediaEmbed: updated Ustream
 - `5552810` Moved JavaScript callbacks deduplication to ConfigOptimizer
 - `2bc612c` TemplateNormalizations: improved parentheses removal in FoldArithmeticConstants
 - `361212f` TemplateNormalizations: preserve strings content in FoldArithmeticConstants
 - `679f0d3` TemplateNormalizations: renamed FoldConstants to FoldArithmeticConstants
 - `470c1da` Updated docblock
 - `0765165` Utils: updated serializeAttributes() to escape quotes in a manner consistent with the parser
 - `caf1dc2` XPathHelper: updated minify() to remove more space around the div operator
 - `38a9c89` XPathHelper: updated minify() to remove spaces after a div operator


0.3.2 (2015-09-06)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/c6fad331e64aeea041ce2da4c5f0e0521bc76afc...dd3fe8c881856bb6279302932912cc8ab957efd1)

### New

 - `dd3fe8c` Added CharacterClassBuilder helper

### Changed

 - `c3f08fb` JavaScript: use returnFalse and returnTrue callbacks as-is
 - `0f5051d` MediaEmbed: simplified the regexp that matches text links


0.3.1 (2015-09-04)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/24a4d8a4ac4aea751428e788ff94cf298646f342...f1ef4fce3431c5ddd59fb345a9e2a839331ea8ad)

### New

 - `51bce03` ClosureCompilerService: added read timeout with a default value of 10s
 - `348e1de` JavaScript: added returnTrue() in utils.js

### Changed

 - `957ada3` ClosureCompilerApplication: updated command line options for v20150901 and turned off warnings
 - `d105dbc` JavaScript: created different externs for ClosureCompilerApplication and ClosureCompilerService
 - `3cab461` MediaEmbed: moved template generation out of add()
 - `c497eb3` MediaEmbed: normalized the order of characters in regexps' character classes
 - `ed7aaaf` MediaEmbed: replaced the 'unresponsive' attribute in site definitions with a 'responsive' attribute
 - `95007fb` MediaEmbed: simplified the generation of Flash templates
 - `a75dd32` Refreshed bundles
 - `d4e81cb` Regexp: avoid adding non-capturing subpatterns to regexps generated by getNamedCaptures() where they are not needed
 - `cd1f119` Regexp: simplified getNamedCaptures()

### Fixed

 - `d363f8b` MediaEmbed: fixed responsive Flash objects
 - `f1ef4fc` Parser: fixed incorrect tag removal


0.3.0 (2015-09-02)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/eab904365c31bb87a016d2c0876e0c149faf93a3...ce1d116ccbc15868856cb2fd65dc9897afd38360)

### Changed

 - `ce1d116` MediaEmbed: moved template generation to its own class
 - `be478e7` MediaEmbed: moved the 'unresponsive' attribute into the iframe/flash definition
 - `3f5e499` MediaEmbed: removed support for custom templates
 - `15e8ece` MediaEmbed: updated Vine

### Fixed

 - `c089b4a` XPathHelper: fixed false negative in isExpressionNumeric()


0.2.1 (2015-08-30)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/90a396d1d63d4c8f69b96a2450a35573b8d676c6...042d1779e37c4f1720042845e1842a1e1d9b5383)

### New

 - `6c181a7` MediaEmbed: added Oddshot.tv
 - `48d03be` TemplateNormalizations: added FoldConstants pass

### Changed

 - `de996ae` Litedown: gave inline links a slightly better priority to give them precedence over BBCodes

### Fixed

 - `6a44f9f` Litedown: fixed incorrect indentation inside fenced code blocks


0.2.0 (2015-08-27)
==================

[Full commit log](https://github.com/s9e/TextFormatter/compare/0.1.0...0.2.0)


0.1.0 (2015-08-12)
==================

Initial release
