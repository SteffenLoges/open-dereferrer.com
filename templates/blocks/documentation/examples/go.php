<?php
if (!defined('ROOT_DIR')) {
    exit('No direct script access allowed');
}
?>
<pre class="hljs"
  style="display: block; overflow-x: auto; padding: 0.5em; background: rgb(35, 36, 31); color: rgb(248, 248, 242);"><span class="hljs-keyword" style="color: rgb(249, 38, 114);">package</span> main

<span class="hljs-keyword" style="color: rgb(249, 38, 114);">import</span> (
	<span class="hljs-string" style="color: rgb(230, 219, 116);">"encoding/base64"</span>
	<span class="hljs-string" style="color: rgb(230, 219, 116);">"fmt"</span>
	<span class="hljs-string" style="color: rgb(230, 219, 116);">"net/url"</span>
	<span class="hljs-string" style="color: rgb(230, 219, 116);">"strings"</span>
)

<span class="hljs-comment" style="color: rgb(117, 113, 94);">// @param string url. The URL to anonymize.</span>
<span class="hljs-comment" style="color: rgb(117, 113, 94);">// @param bool encode. Base64 encodes the URL and makes it unreadable to the blind eye.</span>
<span class="hljs-comment" style="color: rgb(117, 113, 94);">// @param bool noSplash. Enables instant redirections without a splash screen.</span>
<span class="hljs-function"><span class="hljs-keyword" style="color: rgb(249, 38, 114);">func</span> <span class="hljs-title" style="color: rgb(166, 226, 46);">AnonymizeURL</span><span class="hljs-params" style="color: rgb(248, 248, 242);">(theURL <span class="hljs-keyword" style="color: rgb(249, 38, 114);">string</span>, encode, noSplash <span class="hljs-keyword" style="color: rgb(249, 38, 114);">bool</span>)</span> <span class="hljs-title" style="color: rgb(166, 226, 46);">string</span></span> {

	<span class="hljs-keyword" style="color: rgb(249, 38, 114);">if</span> encode {
		theURL = base64.StdEncoding.EncodeToString([]<span class="hljs-keyword" style="color: rgb(249, 38, 114);">byte</span>(theURL))
		theURL = strings.Replace(theURL, <span class="hljs-string" style="color: rgb(230, 219, 116);">"+"</span>, <span class="hljs-string" style="color: rgb(230, 219, 116);">"-"</span>, <span class="hljs-number" style="color: rgb(174, 129, 255);">-1</span>)
		theURL = strings.Replace(theURL, <span class="hljs-string" style="color: rgb(230, 219, 116);">"/"</span>, <span class="hljs-string" style="color: rgb(230, 219, 116);">"_"</span>, <span class="hljs-number" style="color: rgb(174, 129, 255);">-1</span>)
		theURL = strings.TrimRight(theURL, <span class="hljs-string" style="color: rgb(230, 219, 116);">"="</span>)
	}

	<span class="hljs-keyword" style="color: rgb(249, 38, 114);">if</span> noSplash {
		<span class="hljs-keyword" style="color: rgb(249, 38, 114);">return</span> <span class="hljs-string" style="color: rgb(230, 219, 116);">"https://nosplash.open-dereferrer.com/"</span> + url.QueryEscape(theURL)
	}

	<span class="hljs-keyword" style="color: rgb(249, 38, 114);">return</span> <span class="hljs-string" style="color: rgb(230, 219, 116);">"https://open-dereferrer.com/"</span> + url.QueryEscape(theURL)

}

<span class="hljs-function"><span class="hljs-keyword" style="color: rgb(249, 38, 114);">func</span> <span class="hljs-title" style="color: rgb(166, 226, 46);">main</span><span class="hljs-params" style="color: rgb(248, 248, 242);">()</span></span> {
	fmt.Println(<span class="hljs-string" style="color: rgb(230, 219, 116);">"Your anonymized URL is: "</span> + AnonymizeURL(<span class="hljs-string" style="color: rgb(230, 219, 116);">"https://www.google.com/"</span>, <span class="hljs-literal" style="color: rgb(174, 129, 255);">true</span>, <span class="hljs-literal" style="color: rgb(174, 129, 255);">false</span>))
	<span class="hljs-comment" style="color: rgb(117, 113, 94);">// Outputs: Your anonymized URL is: https://open-dereferrer.com/aHR0cHM6Ly93d3cuZ29vZ2xlLmNvbS8</span>
}
</pre>