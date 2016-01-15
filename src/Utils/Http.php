<?php

/**
* @package   s9e\TextFormatter
* @copyright Copyright (c) 2010-2016 The s9e Authors
* @license   http://www.opensource.org/licenses/mit-license.php The MIT License
*/
namespace s9e\TextFormatter\Utils;

use s9e\TextFormatter\Utils\Http\Clients\Curl;
use s9e\TextFormatter\Utils\Http\Clients\Native;

abstract class Http
{
	/**
	* Instantiate and return an HTTP client
	*
	* @return Http\Client
	*/
	public static function getClient()
	{
		return (extension_loaded('curl')) ? new Curl : new Native;
	}
}