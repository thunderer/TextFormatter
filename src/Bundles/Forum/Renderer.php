<?php
/**
* @package   s9e\TextFormatter
* @copyright Copyright (c) 2010-2015 The s9e Authors
* @license   http://www.opensource.org/licenses/mit-license.php The MIT License
*/

namespace s9e\TextFormatter\Bundles\Forum;

class Renderer extends \s9e\TextFormatter\Renderer
{
	protected $params=['EMOTICONS_PATH'=>'','L_HIDE'=>'Hide','L_SHOW'=>'Show','L_SPOILER'=>'Spoiler','L_WROTE'=>'wrote:'];
	protected static $tagBranches=['B'=>0,'BANDCAMP'=>1,'CENTER'=>2,'CODE'=>3,'COLOR'=>4,'DAILYMOTION'=>5,'E'=>6,'EMAIL'=>7,'FACEBOOK'=>8,'FONT'=>9,'GROOVESHARK'=>10,'I'=>11,'INDIEGOGO'=>12,'INSTAGRAM'=>13,'KICKSTARTER'=>14,'LI'=>15,'LIST'=>16,'LIVELEAK'=>17,'QUOTE'=>18,'S'=>19,'SIZE'=>20,'SOUNDCLOUD'=>21,'SPOILER'=>22,'TWITCH'=>23,'U'=>24,'URL'=>25,'VIMEO'=>26,'VINE'=>27,'WSHH'=>28,'YOUTUBE'=>29,'br'=>30,'e'=>31,'i'=>31,'s'=>31,'p'=>32];
	protected static $bt9C97241C=[':('=>0,':)'=>1,':-('=>2,':-)'=>3,':-*'=>4,':-?'=>5,':-D'=>6,':-P'=>7,':-p'=>8,':-|'=>9,':?'=>10,':D'=>11,':P'=>12,':lol:'=>13,':o'=>14,':p'=>15,':|'=>16,';)'=>17,';-)'=>18];
	protected $xpath;
	public function __sleep()
	{
		$props = get_object_vars($this);
		unset($props['out'], $props['proc'], $props['source'], $props['xpath']);
		return array_keys($props);
	}
	public function renderRichText($xml)
	{
		if (!isset(self::$quickRenderingTest) || !preg_match(self::$quickRenderingTest, $xml))
			try
			{
				return $this->renderQuick($xml);
			}
			catch (\Exception $e)
			{
			}
		$dom = $this->loadXML($xml);
		$this->xpath = new \DOMXPath($dom);
		$this->out = '';
		$this->at($dom->documentElement);
		$this->xpath = null;
		return $this->out;
	}
	protected function at(\DOMNode $root)
	{
		if ($root->nodeType === 3)
			$this->out .= htmlspecialchars($root->textContent,0);
		else
			foreach ($root->childNodes as $node)
				if (!isset(self::$tagBranches[$node->nodeName]))
					$this->at($node);
				else
				{
					$tb = self::$tagBranches[$node->nodeName];
					if($tb<17)if($tb<9)if($tb<5)if($tb<3)if($tb===0){$this->out.='<b>';$this->at($node);$this->out.='</b>';}elseif($tb===1){$this->out.='<iframe width="400" height="400" allowfullscreen="" frameborder="0" scrolling="no" src="//bandcamp.com/EmbeddedPlayer/size=large/minimal=true/';if($node->hasAttribute('album_id')){$this->out.='album='.htmlspecialchars($node->getAttribute('album_id'),2);if($node->hasAttribute('track_num'))$this->out.='/t='.htmlspecialchars($node->getAttribute('track_num'),2);}else$this->out.='track='.htmlspecialchars($node->getAttribute('track_id'),2);$this->out.='"></iframe>';}else{$this->out.='<div style="text-align:center">';$this->at($node);$this->out.='</div>';}elseif($tb===3){$this->out.='<pre data-s9e-livepreview-postprocess="if(\'undefined\'!==typeof hljs){var a=this.innerHTML;a in hljs._?this.innerHTML=hljs._[a]:(Object.keys&amp;&amp;7&lt;Object.keys(hljs._).length&amp;&amp;(hljs._={}),hljs.highlightBlock(this.firstChild),hljs._[a]=this.innerHTML)};"><code class="'.htmlspecialchars($node->getAttribute('lang'),2).'">';$this->at($node);$this->out.='</code></pre>';if($this->xpath->evaluate('not(following::CODE)',$node))$this->out.='<script>if("undefined"===typeof hljs){var a=document.getElementsByTagName("head")[0],b=document.createElement("link");b.type="text/css";b.rel="stylesheet";b.href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/7.3/styles/github.min.css";a.appendChild(b);b=document.createElement("script");b.type="text/javascript";b.onload=function(){hljs._={};hljs.initHighlighting()};b.async=!0;b.src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/7.3/highlight.min.js";a.appendChild(b)};</script>';}else{$this->out.='<span style="color:'.htmlspecialchars($node->getAttribute('color'),2).'">';$this->at($node);$this->out.='</span>';}elseif($tb===5)$this->out.='<iframe width="560" height="315" src="//www.dailymotion.com/embed/video/'.htmlspecialchars($node->getAttribute('id'),2).'" allowfullscreen="" frameborder="0" scrolling="no"></iframe>';elseif($tb===6)if(isset(self::$bt9C97241C[$node->textContent])){$n=self::$bt9C97241C[$node->textContent];$this->out.='<img src="'.htmlspecialchars($this->params['EMOTICONS_PATH'],2);if($n<10)if($n<5)if($n<3)if($n===0)$this->out.='/frown.png" alt=":(">';elseif($n===1)$this->out.='/smile.png" alt=":)">';else$this->out.='/frown.png" alt=":-(">';elseif($n===3)$this->out.='/smile.png" alt=":-)">';else$this->out.='/kiss.png" alt=":-*">';elseif($n<8)if($n===5)$this->out.='/confused.png" alt=":-?">';elseif($n===6)$this->out.='/grin.png" alt=":-D">';else$this->out.='/razz.png" alt=":-P">';elseif($n===8)$this->out.='/razz.png" alt=":-p">';else$this->out.='/neutral.png" alt=":-|">';elseif($n<15)if($n<13)if($n===10)$this->out.='/confused.png" alt=":?">';elseif($n===11)$this->out.='/grin.png" alt=":D">';else$this->out.='/razz.png" alt=":P">';elseif($n===13)$this->out.='/laugh.png" alt=":lol:">';else$this->out.='/shock.png" alt=":o">';elseif($n===15)$this->out.='/razz.png" alt=":p">';elseif($n===16)$this->out.='/neutral.png" alt=":|">';elseif($n===17)$this->out.='/wink.png" alt=";)">';else$this->out.='/wink.png" alt=";-)">';}else$this->out.=htmlspecialchars($node->textContent,0);elseif($tb===7){$this->out.='<a href="mailto:'.htmlspecialchars($node->getAttribute('email'),2).'">';$this->at($node);$this->out.='</a>';}else$this->out.='<iframe width="560" height="315" src="//s9e.github.io/iframe/facebook.min.html#'.htmlspecialchars($node->getAttribute('id'),2).'" onload="var a=Math.random();window.addEventListener(\'message\',function(b){if(b.data.id==a)style.height=b.data.height+\'px\'});contentWindow.postMessage(\'s9e:\'+a,src.substr(0,src.indexOf(\'/\',8)))" allowfullscreen="" frameborder="0" scrolling="no"></iframe>';elseif($tb<13)if($tb===9){$this->out.='<span style="font-family:'.htmlspecialchars($node->getAttribute('font'),2).'">';$this->at($node);$this->out.='</span>';}elseif($tb===10)$this->out.='<object type="application/x-shockwave-flash" typemustmatch="" width="400" height="'.htmlspecialchars(($node->hasAttribute('songid')?40:400),2).'" data="//grooveshark.com/'.htmlspecialchars(($node->hasAttribute('songid')?'songW':'w'),2).'idget.swf"><param name="allowfullscreen" value="true"><param name="flashvars" value="playlistID='.htmlspecialchars($node->getAttribute('playlistid'),2).'&amp;songID='.htmlspecialchars($node->getAttribute('songid'),2).'"><embed type="application/x-shockwave-flash" width="400" height="'.htmlspecialchars(($node->hasAttribute('songid')?40:400),2).'" src="//grooveshark.com/'.htmlspecialchars(($node->hasAttribute('songid')?'songW':'w'),2).'idget.swf" allowfullscreen="" flashvars="playlistID='.htmlspecialchars($node->getAttribute('playlistid'),2).'&amp;songID='.htmlspecialchars($node->getAttribute('songid'),2).'"></object>';elseif($tb===11){$this->out.='<i>';$this->at($node);$this->out.='</i>';}else$this->out.='<iframe width="224" height="486" src="//www.indiegogo.com/project/'.htmlspecialchars($node->getAttribute('id'),2).'/widget" allowfullscreen="" frameborder="0" scrolling="no"></iframe>';elseif($tb===13)$this->out.='<iframe width="612" height="710" src="//instagram.com/p/'.htmlspecialchars($node->getAttribute('id'),2).'/embed/" allowfullscreen="" frameborder="0" scrolling="no"></iframe>';elseif($tb===14){$this->out.='<iframe allowfullscreen="" frameborder="0" scrolling="no" width="';if($node->hasAttribute('video'))$this->out.='480';else$this->out.='220';$this->out.='" height="';if($node->hasAttribute('video'))$this->out.='360';else$this->out.='420';$this->out.='" src="//www.kickstarter.com/projects/'.htmlspecialchars($node->getAttribute('id'),2).'/widget/';if($node->hasAttribute('video'))$this->out.='video';else$this->out.='card';$this->out.='.html"></iframe>';}elseif($tb===15){$this->out.='<li>';$this->at($node);$this->out.='</li>';}elseif(!$node->hasAttribute('type')){$this->out.='<ul>';$this->at($node);$this->out.='</ul>';}elseif(strpos('upperlowerdecim',substr($node->getAttribute('type'),0,5))!==false){$this->out.='<ol style="list-style-type:'.htmlspecialchars($node->getAttribute('type'),2).'">';$this->at($node);$this->out.='</ol>';}else{$this->out.='<ul style="list-style-type:'.htmlspecialchars($node->getAttribute('type'),2).'">';$this->at($node);$this->out.='</ul>';}elseif($tb<25)if($tb<21)if($tb===17)$this->out.='<iframe width="640" height="360" src="http://www.liveleak.com/ll_embed?i='.htmlspecialchars($node->getAttribute('id'),2).'" allowfullscreen="" frameborder="0" scrolling="no"></iframe>';elseif($tb===18){$this->out.='<blockquote';if(!$node->hasAttribute('author'))$this->out.=' class="uncited"';$this->out.='><div>';if($node->hasAttribute('author'))$this->out.='<cite>'.htmlspecialchars($node->getAttribute('author'),0).' '.htmlspecialchars($this->params['L_WROTE'],0).'</cite>';$this->at($node);$this->out.='</div></blockquote>';}elseif($tb===19){$this->out.='<s>';$this->at($node);$this->out.='</s>';}else{$this->out.='<span style="font-size:'.htmlspecialchars($node->getAttribute('size'),2).'px">';$this->at($node);$this->out.='</span>';}elseif($tb===21){$this->out.='<iframe width="100%" height="166" style="max-width:900px" allowfullscreen="" frameborder="0" scrolling="no" src="https://w.soundcloud.com/player/?url=';if($node->hasAttribute('secret_token')&&$node->hasAttribute('playlist_id'))$this->out.='https://api.soundcloud.com/playlists/'.htmlspecialchars($node->getAttribute('playlist_id'),2).'&amp;secret_token='.htmlspecialchars($node->getAttribute('secret_token'),2);elseif($node->hasAttribute('secret_token')&&$node->hasAttribute('track_id'))$this->out.='https://api.soundcloud.com/tracks/'.htmlspecialchars($node->getAttribute('track_id'),2).'&amp;secret_token='.htmlspecialchars($node->getAttribute('secret_token'),2);else{if((strpos($node->getAttribute('id'),'://')===false))$this->out.='https://soundcloud.com/';$this->out.=htmlspecialchars($node->getAttribute('id'),2);if($node->hasAttribute('secret_token'))$this->out.='&amp;secret_token='.htmlspecialchars($node->getAttribute('secret_token'),2);}$this->out.='"></iframe>';}elseif($tb===22){$this->out.='<div class="spoiler"><div class="spoiler-header"><button onclick="var c=this.parentNode.nextSibling.style,s=this.firstChild.style,h=this.lastChild.style;\'\'!=c.display?(c.display=h.display=\'\',s.display=\'none\'):(c.display=h.display=\'none\',s.display=\'\')"><span>'.htmlspecialchars($this->params['L_SHOW'],0).'</span><span style="display:none">'.htmlspecialchars($this->params['L_HIDE'],0).'</span></button><span class="spoiler-title">'.htmlspecialchars($this->params['L_SPOILER'],0).' '.htmlspecialchars($node->getAttribute('title'),0).'</span></div><div class="spoiler-content" style="display:none">';$this->at($node);$this->out.='</div></div>';}elseif($tb===23){$this->out.='<iframe width="620" height="378" allowfullscreen="" frameborder="0" scrolling="no" src="//s9e.github.io/iframe/twitch.min.html#channel='.htmlspecialchars($node->getAttribute('channel'),2);if($node->hasAttribute('archive_id'))$this->out.='&amp;videoId=a'.htmlspecialchars($node->getAttribute('archive_id'),2);elseif($node->hasAttribute('chapter_id'))$this->out.='&amp;videoId=c'.htmlspecialchars($node->getAttribute('chapter_id'),2);elseif($node->hasAttribute('video_id'))$this->out.='&amp;videoId=v'.htmlspecialchars($node->getAttribute('video_id'),2);$this->out.='"></iframe>';}else{$this->out.='<u>';$this->at($node);$this->out.='</u>';}elseif($tb<29)if($tb===25){$this->out.='<a href="'.htmlspecialchars($node->getAttribute('url'),2).'"';if($node->hasAttribute('title'))$this->out.=' title="'.htmlspecialchars($node->getAttribute('title'),2).'"';$this->out.='>';$this->at($node);$this->out.='</a>';}elseif($tb===26)$this->out.='<iframe width="560" height="315" src="//player.vimeo.com/video/'.htmlspecialchars($node->getAttribute('id'),2).'" allowfullscreen="" frameborder="0" scrolling="no"></iframe>';elseif($tb===27)$this->out.='<iframe width="480" height="480" src="https://vine.co/v/'.htmlspecialchars($node->getAttribute('id'),2).'/embed/simple" allowfullscreen="" frameborder="0" scrolling="no"></iframe><script async="" src="//platform.vine.co/static/scripts/embed.js" charset="utf-8"></script>';else$this->out.='<iframe width="640" height="360" src="//www.worldstarhiphop.com/embed/'.htmlspecialchars($node->getAttribute('id'),2).'" allowfullscreen="" frameborder="0" scrolling="no"></iframe>';elseif($tb===29){$this->out.='<iframe width="560" height="315" allowfullscreen="" frameborder="0" scrolling="no" src="//www.youtube.com/embed/'.htmlspecialchars($node->getAttribute('id'),2);if($node->hasAttribute('list'))$this->out.='?list='.htmlspecialchars($node->getAttribute('list'),2);if($node->hasAttribute('t')||$node->hasAttribute('m')){if($node->hasAttribute('list'))$this->out.='&amp;';else$this->out.='?';$this->out.='start=';if($node->hasAttribute('t'))$this->out.=htmlspecialchars($node->getAttribute('t'),2);elseif($node->hasAttribute('h'))$this->out.=htmlspecialchars($node->getAttribute('h')*3600+$node->getAttribute('m')*60+$node->getAttribute('s'),2);else$this->out.=htmlspecialchars($node->getAttribute('m')*60+$node->getAttribute('s'),2);}$this->out.='"></iframe>';}elseif($tb===30)$this->out.='<br>';elseif($tb===31);else{$this->out.='<p>';$this->at($node);$this->out.='</p>';}
				}
	}
	private static $static=['/B'=>'</b>','/CENTER'=>'</div>','/COLOR'=>'</span>','/EMAIL'=>'</a>','/FONT'=>'</span>','/I'=>'</i>','/LI'=>'</li>','/QUOTE'=>'</div></blockquote>','/S'=>'</s>','/SIZE'=>'</span>','/SPOILER'=>'</div></div>','/U'=>'</u>','/URL'=>'</a>','B'=>'<b>','CENTER'=>'<div style="text-align:center">','I'=>'<i>','LI'=>'<li>','S'=>'<s>','U'=>'<u>'];
	private static $dynamic=['COLOR'=>['(^[^ ]+(?> (?!color=)[^=]+="[^"]*")*(?> color="([^"]*)")?.*)s','<span style="color:$1">'],'DAILYMOTION'=>['(^[^ ]+(?> (?!id=)[^=]+="[^"]*")*(?> id="([^"]*)")?.*)s','<iframe width="560" height="315" src="//www.dailymotion.com/embed/video/$1" allowfullscreen="" frameborder="0" scrolling="no"></iframe>'],'EMAIL'=>['(^[^ ]+(?> (?!email=)[^=]+="[^"]*")*(?> email="([^"]*)")?.*)s','<a href="mailto:$1">'],'FACEBOOK'=>['(^[^ ]+(?> (?!id=)[^=]+="[^"]*")*(?> id="([^"]*)")?.*)s','<iframe width="560" height="315" src="//s9e.github.io/iframe/facebook.min.html#$1" onload="var a=Math.random();window.addEventListener(\'message\',function(b){if(b.data.id==a)style.height=b.data.height+\'px\'});contentWindow.postMessage(\'s9e:\'+a,src.substr(0,src.indexOf(\'/\',8)))" allowfullscreen="" frameborder="0" scrolling="no"></iframe>'],'FONT'=>['(^[^ ]+(?> (?!font=)[^=]+="[^"]*")*(?> font="([^"]*)")?.*)s','<span style="font-family:$1">'],'INDIEGOGO'=>['(^[^ ]+(?> (?!id=)[^=]+="[^"]*")*(?> id="([^"]*)")?.*)s','<iframe width="224" height="486" src="//www.indiegogo.com/project/$1/widget" allowfullscreen="" frameborder="0" scrolling="no"></iframe>'],'INSTAGRAM'=>['(^[^ ]+(?> (?!id=)[^=]+="[^"]*")*(?> id="([^"]*)")?.*)s','<iframe width="612" height="710" src="//instagram.com/p/$1/embed/" allowfullscreen="" frameborder="0" scrolling="no"></iframe>'],'LIVELEAK'=>['(^[^ ]+(?> (?!id=)[^=]+="[^"]*")*(?> id="([^"]*)")?.*)s','<iframe width="640" height="360" src="http://www.liveleak.com/ll_embed?i=$1" allowfullscreen="" frameborder="0" scrolling="no"></iframe>'],'SIZE'=>['(^[^ ]+(?> (?!size=)[^=]+="[^"]*")*(?> size="([^"]*)")?.*)s','<span style="font-size:$1px">'],'URL'=>['(^[^ ]+(?> (?!(?>title|url)=)[^=]+="[^"]*")*( title="[^"]*")?(?> (?!url=)[^=]+="[^"]*")*(?> url="([^"]*)")?.*)s','<a href="$2"$1>'],'VIMEO'=>['(^[^ ]+(?> (?!id=)[^=]+="[^"]*")*(?> id="([^"]*)")?.*)s','<iframe width="560" height="315" src="//player.vimeo.com/video/$1" allowfullscreen="" frameborder="0" scrolling="no"></iframe>'],'VINE'=>['(^[^ ]+(?> (?!id=)[^=]+="[^"]*")*(?> id="([^"]*)")?.*)s','<iframe width="480" height="480" src="https://vine.co/v/$1/embed/simple" allowfullscreen="" frameborder="0" scrolling="no"></iframe><script async="" src="//platform.vine.co/static/scripts/embed.js" charset="utf-8"></script>'],'WSHH'=>['(^[^ ]+(?> (?!id=)[^=]+="[^"]*")*(?> id="([^"]*)")?.*)s','<iframe width="640" height="360" src="//www.worldstarhiphop.com/embed/$1" allowfullscreen="" frameborder="0" scrolling="no"></iframe>']];
	private static $attributes;
	private static $quickBranches=['/LIST'=>0,'BANDCAMP'=>1,'E'=>2,'GROOVESHARK'=>3,'KICKSTARTER'=>4,'LIST'=>5,'QUOTE'=>6,'SOUNDCLOUD'=>7,'SPOILER'=>8,'TWITCH'=>9,'YOUTUBE'=>10];
	public static $quickRenderingTest='(<CODE[ />])';

	protected function renderQuick($xml)
	{
		if (strpos($xml, '&#') !== false)
			$xml = html_entity_decode($xml, ENT_NOQUOTES, 'UTF-8');

		self::$attributes = [];
		$html = preg_replace_callback(
			'(<(?:(?!/)((?>E|BANDCAMP|DAILYMOTION|FACEBOOK|GROOVESHARK|IN(?>DIEGOGO|STAGRAM)|KICKSTARTER|LIVELEAK|SOUNDCLOUD|TWITCH|VI(?>MEO|NE)|WSHH|YOUTUBE))(?: [^>]*)?>.*?</\\1|(/?(?!br/|p>)[^ />]+)[^>]*?(/)?)>)',
			[$this, 'quick'],
			preg_replace(
				'(<[eis]>[^<]*</[eis]>)',
				'',
				substr($xml, 1 + strpos($xml, '>'), -4)
			)
		);

		return str_replace('<br/>', '<br>', $html);
	}

	protected function quick($m)
	{
		if (isset($m[2]))
		{
			$id = $m[2];

			if (isset($m[3]))
			{
				unset($m[3]);

				$m[0] = substr($m[0], 0, -2) . '>';
				$html = $this->quick($m);

				$m[0] = '</' . $id . '>';
				$m[2] = '/' . $id;
				$html .= $this->quick($m);

				return $html;
			}
		}
		else
		{
			$id = $m[1];

			$lpos = 1 + strpos($m[0], '>');
			$rpos = strrpos($m[0], '<');
			$textContent = substr($m[0], $lpos, $rpos - $lpos);

			if (strpos($textContent, '<') !== false)
				throw new \RuntimeException;

			$textContent = htmlspecialchars_decode($textContent);
		}

		if (isset(self::$static[$id]))
			return self::$static[$id];

		if (isset(self::$dynamic[$id]))
		{
			list($match, $replace) = self::$dynamic[$id];
			$html = preg_replace($match, $replace, $m[0], 1, $cnt);
			if ($cnt)
				return $html;
		}

		if (!isset(self::$quickBranches[$id]))
		{
			if (preg_match('(^/?CODE$)', $id))
				throw new \RuntimeException;
			return '';
		}

		$attributes = [];
		if (strpos($m[0], '="') !== false)
		{
			preg_match_all('(([^ =]++)="([^"]*))S', substr($m[0], 0, strpos($m[0], '>')), $matches);
			foreach ($matches[1] as $i => $attrName)
				$attributes[$attrName] = $matches[2][$i];
		}

		$qb = self::$quickBranches[$id];
		if($qb<6)if($qb<3)if($qb===0){$attributes=array_pop(self::$attributes);$html='';if(!isset($attributes['type']))$html.='</ul>';elseif(strpos('upperlowerdecim',substr(htmlspecialchars_decode($attributes['type']),0,5))!==false)$html.='</ol>';else$html.='</ul>';}elseif($qb===1){$attributes+=['track_num'=>null,'track_id'=>null];$html='<iframe width="400" height="400" allowfullscreen="" frameborder="0" scrolling="no" src="//bandcamp.com/EmbeddedPlayer/size=large/minimal=true/';if(isset($attributes['album_id'])){$html.='album='.$attributes['album_id'];if(isset($attributes['track_num']))$html.='/t='.$attributes['track_num'];}else$html.='track='.$attributes['track_id'];$html.='"></iframe>';}else{$html='';if(isset(self::$bt9C97241C[$textContent])){$n=self::$bt9C97241C[$textContent];$html.='<img src="'.htmlspecialchars($this->params['EMOTICONS_PATH'],2);if($n<10)if($n<5)if($n<3)if($n===0)$html.='/frown.png" alt=":(">';elseif($n===1)$html.='/smile.png" alt=":)">';else$html.='/frown.png" alt=":-(">';elseif($n===3)$html.='/smile.png" alt=":-)">';else$html.='/kiss.png" alt=":-*">';elseif($n<8)if($n===5)$html.='/confused.png" alt=":-?">';elseif($n===6)$html.='/grin.png" alt=":-D">';else$html.='/razz.png" alt=":-P">';elseif($n===8)$html.='/razz.png" alt=":-p">';else$html.='/neutral.png" alt=":-|">';elseif($n<15)if($n<13)if($n===10)$html.='/confused.png" alt=":?">';elseif($n===11)$html.='/grin.png" alt=":D">';else$html.='/razz.png" alt=":P">';elseif($n===13)$html.='/laugh.png" alt=":lol:">';else$html.='/shock.png" alt=":o">';elseif($n===15)$html.='/razz.png" alt=":p">';elseif($n===16)$html.='/neutral.png" alt=":|">';elseif($n===17)$html.='/wink.png" alt=";)">';else$html.='/wink.png" alt=";-)">';}else$html.=htmlspecialchars($textContent,0);}elseif($qb===3){$attributes+=['playlistid'=>null,'songid'=>null];$html='<object type="application/x-shockwave-flash" typemustmatch="" width="400" height="'.htmlspecialchars((isset($attributes['songid'])?40:400),2).'" data="//grooveshark.com/'.htmlspecialchars((isset($attributes['songid'])?'songW':'w'),2).'idget.swf"><param name="allowfullscreen" value="true"><param name="flashvars" value="playlistID='.$attributes['playlistid'].'&amp;songID='.$attributes['songid'].'"><embed type="application/x-shockwave-flash" width="400" height="'.htmlspecialchars((isset($attributes['songid'])?40:400),2).'" src="//grooveshark.com/'.htmlspecialchars((isset($attributes['songid'])?'songW':'w'),2).'idget.swf" allowfullscreen="" flashvars="playlistID='.$attributes['playlistid'].'&amp;songID='.$attributes['songid'].'"></object>';}elseif($qb===4){$attributes+=['id'=>null];$html='<iframe allowfullscreen="" frameborder="0" scrolling="no" width="';if(isset($attributes['video']))$html.='480';else$html.='220';$html.='" height="';if(isset($attributes['video']))$html.='360';else$html.='420';$html.='" src="//www.kickstarter.com/projects/'.$attributes['id'].'/widget/';if(isset($attributes['video']))$html.='video';else$html.='card';$html.='.html"></iframe>';}else{$attributes+=['type'=>null];$html='';if(!isset($attributes['type']))$html.='<ul>';elseif(strpos('upperlowerdecim',substr(htmlspecialchars_decode($attributes['type']),0,5))!==false)$html.='<ol style="list-style-type:'.$attributes['type'].'">';else$html.='<ul style="list-style-type:'.$attributes['type'].'">';self::$attributes[]=$attributes;}elseif($qb<9)if($qb===6){$html='<blockquote';if(!isset($attributes['author']))$html.=' class="uncited"';$html.='><div>';if(isset($attributes['author']))$html.='<cite>'.str_replace('&quot;','"',$attributes['author']).' '.htmlspecialchars($this->params['L_WROTE'],0).'</cite>';}elseif($qb===7){$attributes+=['playlist_id'=>null,'track_id'=>null,'id'=>null];$html='<iframe width="100%" height="166" style="max-width:900px" allowfullscreen="" frameborder="0" scrolling="no" src="https://w.soundcloud.com/player/?url=';if(isset($attributes['secret_token'])&&isset($attributes['playlist_id']))$html.='https://api.soundcloud.com/playlists/'.$attributes['playlist_id'].'&amp;secret_token='.$attributes['secret_token'];elseif(isset($attributes['secret_token'])&&isset($attributes['track_id']))$html.='https://api.soundcloud.com/tracks/'.$attributes['track_id'].'&amp;secret_token='.$attributes['secret_token'];else{if((strpos($attributes['id'],'://')===false))$html.='https://soundcloud.com/';$html.=$attributes['id'];if(isset($attributes['secret_token']))$html.='&amp;secret_token='.$attributes['secret_token'];}$html.='"></iframe>';}else{$attributes+=['title'=>null];$html='<div class="spoiler"><div class="spoiler-header"><button onclick="var c=this.parentNode.nextSibling.style,s=this.firstChild.style,h=this.lastChild.style;\'\'!=c.display?(c.display=h.display=\'\',s.display=\'none\'):(c.display=h.display=\'none\',s.display=\'\')"><span>'.htmlspecialchars($this->params['L_SHOW'],0).'</span><span style="display:none">'.htmlspecialchars($this->params['L_HIDE'],0).'</span></button><span class="spoiler-title">'.htmlspecialchars($this->params['L_SPOILER'],0).' '.str_replace('&quot;','"',$attributes['title']).'</span></div><div class="spoiler-content" style="display:none">';}elseif($qb===9){$attributes+=['channel'=>null];$html='<iframe width="620" height="378" allowfullscreen="" frameborder="0" scrolling="no" src="//s9e.github.io/iframe/twitch.min.html#channel='.$attributes['channel'];if(isset($attributes['archive_id']))$html.='&amp;videoId=a'.$attributes['archive_id'];elseif(isset($attributes['chapter_id']))$html.='&amp;videoId=c'.$attributes['chapter_id'];elseif(isset($attributes['video_id']))$html.='&amp;videoId=v'.$attributes['video_id'];$html.='"></iframe>';}else{$attributes+=['id'=>null,'m'=>null,'s'=>null];$html='<iframe width="560" height="315" allowfullscreen="" frameborder="0" scrolling="no" src="//www.youtube.com/embed/'.$attributes['id'];if(isset($attributes['list']))$html.='?list='.$attributes['list'];if(isset($attributes['t'])||isset($attributes['m'])){if(isset($attributes['list']))$html.='&amp;';else$html.='?';$html.='start=';if(isset($attributes['t']))$html.=$attributes['t'];elseif(isset($attributes['h']))$html.=htmlspecialchars($attributes['h']*3600+$attributes['m']*60+$attributes['s'],2);else$html.=htmlspecialchars($attributes['m']*60+$attributes['s'],2);}$html.='"></iframe>';}

		return $html;
	}
}