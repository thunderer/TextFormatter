<?xml version="1.0" encoding="utf-8"?><xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"><xsl:output method="html" encoding="utf-8" indent="no"/><xsl:template match="p"><p><xsl:apply-templates/></p></xsl:template><xsl:template match="br"><br/></xsl:template><xsl:template match="et|i|st"/><xsl:template match="WSHH"><object type="application/x-shockwave-flash" typemustmatch="" width="448" height="374" data="http://www.worldstarhiphop.com/videos/e/16711680/{@id}"><param name="allowfullscreen" value="true"/><embed type="application/x-shockwave-flash" src="http://www.worldstarhiphop.com/videos/e/16711680/{@id}" width="448" height="374" allowfullscreen=""/></object></xsl:template></xsl:stylesheet>