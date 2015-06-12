<?php

/*
* @package   s9e\TextFormatter
* @copyright Copyright (c) 2010-2015 The s9e Authors
* @license   http://www.opensource.org/licenses/mit-license.php The MIT License
*/
namespace s9e\TextFormatter\Plugins\Preg;

use s9e\TextFormatter\Plugins\ParserBase;

class Parser extends ParserBase
{
	public function parse($text, array $matches)
	{
		foreach ($this->config['generics'] as $_ca164be8)
		{
			list($tagName, $regexp, $passthroughIdx) = $_ca164be8;
			\preg_match_all($regexp, $text, $matches, \PREG_SET_ORDER | \PREG_OFFSET_CAPTURE);

			foreach ($matches as $m)
			{
				$startTagPos = $m[0][1];
				$matchLen    = \strlen($m[0][0]);

				if ($passthroughIdx && isset($m[$passthroughIdx]) && $m[$passthroughIdx][0] !== '')
				{
					$contentPos  = $m[$passthroughIdx][1];
					$contentLen  = \strlen($m[$passthroughIdx][0]);
					$startTagLen = $contentPos - $startTagPos;
					$endTagPos   = $contentPos + $contentLen;
					$endTagLen   = $matchLen - ($startTagLen + $contentLen);

					$tag = $this->parser->addTagPair(
						$tagName,
						$startTagPos,
						$startTagLen,
						$endTagPos,
						$endTagLen
					);
				}
				else
					$tag = $this->parser->addSelfClosingTag($tagName, $startTagPos, $matchLen);

				foreach ($m as $k => $v)
					if (!\is_numeric($k))
						$tag->setAttribute($k, $v[0]);
			}
		}
	}
}