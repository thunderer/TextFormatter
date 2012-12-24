<?php

/**
* @package   s9e\TextFormatter
* @copyright Copyright (c) 2010-2012 The s9e Authors
* @license   http://www.opensource.org/licenses/mit-license.php The MIT License
*/
namespace s9e\TextFormatter\Parser;

trait RulesHandling
{
	/**
	* Apply closeAncestor rules associated with given tag
	*
	* @param  string $tagName Name of the tag
	* @return bool            Whether a new tag has been added
	*/
	protected function closeAncestor($tagName)
	{
		$tagConfig = $this->tagsConfig[$tagName];

		if (!empty($tagConfig['rules']['closeAncestor']))
		{
			$i = count($this->openTags);

			while (--$i >= 0)
			{
				$ancestor     = $this->openTags[$i];
				$ancestorName = $ancestor->getName();

				if (isset($tagConfig['rules']['closeAncestor'][$ancestorName]))
				{
					// We have to close this ancestor. First we reinsert current tag...
					$this->tagStack[] = $this->currentTag;

					// ...then we add a new end tag which we pair with the one we want closed
					$this->addEndTag($ancestorName, $this->currentTag->getPos(), 0)
					     ->pairWith($ancestor);

					return true;
				}
			}
		}

		return false;
	}

	/**
	* Apply closeParent rules associated with given tag
	*
	* @param  Tag  $tag Name of the tag
	* @return bool      Whether a new tag has been added
	*/
	protected function closeParent($tag)
	{
		if (!empty($this->openTags))
		{
			$tagName   = $tag->getName();
			$tagConfig = $this->tagsConfig[$tagName];

			if (!empty($tagConfig['rules']['closeParent']))
			{
				$parent     = end($this->openTags);
				$parentName = $parent->getName();

				if (isset($tagConfig['rules']['closeParent'][$parentName]))
				{
					// We have to close that parent. First we reinsert the tag...
					$this->tagStack[] = $tag;

					// ...then we create a new end tag for its parent
					$this->addEndTag($parentName, $tag->getPos(), 0);

					return true;
				}
			}
		}

		return false;
	}

	/**
	* Apply requireAncestor rules associated with given tag
	*
	* @param  string $tagName Name of the tag
	* @return bool            Whether a new tag has been added
	*/
	protected function requireAncestor($tagName)
	{
		$tagConfig = $this->tagsConfig[$tagName];

		if (isset($tagConfig['rules']['requireAncestor']))
		{
			foreach ($tagConfig['rules']['requireAncestor'] as $ancestorName)
			{
				if (!empty($this->cntOpen[$ancestorName]))
				{
					return false;
				}
			}

			$this->logger->err('Tag requires an ancestor', array(
				'requireAncestor' => implode(',', $tagConfig['rules']['requireAncestor']),
				'tag'             => $tag
			));

			return true;
		}

		return false;
	}

	/**
	* Return whether given tag is allowed in current context
	*
	* @param  string $tagName
	* @return bool
	*/
	protected function tagIsAllowed($tagName)
	{
		$n = $this->tagsConfig[$tagName]['bitNumber'];

		return (bool) (ord($this->context['allowedChildren'][$n >> 8]) & (1 << ($n & 7)));
	}
}