<?php
if (!defined('ROOT_DIR')) {
    exit('No direct script access allowed');
}
?>
<pre class="hljs"
  style="display: block; overflow-x: auto; padding: 0.5em; background: rgb(35, 36, 31); color: rgb(248, 248, 242);"><span class="hljs-comment" style="color: rgb(117, 113, 94);">// @param string url. The URL to anonymize.</span>
<span class="hljs-comment" style="color: rgb(117, 113, 94);">// @param bool encode. Base64 encodes the URL and makes it unreadable to the blind eye.</span>
<span class="hljs-comment" style="color: rgb(117, 113, 94);">// @param bool noSplash. Enables instant redirections without a splash screen.</span>
<span class="hljs-function"><span class="hljs-keyword" style="color: rgb(249, 38, 114);">function</span> <span class="hljs-title" style="color: rgb(166, 226, 46);">anonymizeURL</span>(<span class="hljs-params" style="color: rgb(248, 248, 242);">url, encode, noSplash</span>) </span>{

  <span class="hljs-keyword" style="color: rgb(249, 38, 114);">if</span> (encode) {
    <span class="hljs-built_in" style="color: rgb(230, 219, 116);">url</span> = btoa(<span class="hljs-built_in" style="color: rgb(230, 219, 116);">url</span>).replace(<span class="hljs-string" style="color: rgb(230, 219, 116);">'+'</span>, <span class="hljs-string" style="color: rgb(230, 219, 116);">'-'</span>).replace(<span class="hljs-string" style="color: rgb(230, 219, 116);">'/'</span>, <span class="hljs-string" style="color: rgb(230, 219, 116);">'_'</span>).replace(<span class="hljs-regexp" style="color: rgb(174, 129, 255);">/=+$/</span>, <span class="hljs-string" style="color: rgb(230, 219, 116);">''</span>);
  }

  <span class="hljs-keyword" style="color: rgb(249, 38, 114);">return</span> <span class="hljs-string" style="color: rgb(230, 219, 116);">'https://'</span> + (noSplash ? <span class="hljs-string" style="color: rgb(230, 219, 116);">'nosplash.'</span> : <span class="hljs-string" style="color: rgb(230, 219, 116);">''</span>) + <span class="hljs-string" style="color: rgb(230, 219, 116);">'open-dereferrer.com/'</span> + <span class="hljs-built_in" style="color: rgb(230, 219, 116);">encodeURIComponent</span>(<span class="hljs-built_in" style="color: rgb(230, 219, 116);">url</span>);

}

<span class="hljs-built_in" style="color: rgb(230, 219, 116);">console</span>.log(<span class="hljs-string" style="color: rgb(230, 219, 116);">'Your anonymized URL is: '</span> + anonymizeURL(<span class="hljs-string" style="color: rgb(230, 219, 116);">'https://www.google.com/'</span>, <span class="hljs-literal" style="color: rgb(174, 129, 255);">true</span>, <span class="hljs-literal" style="color: rgb(174, 129, 255);">false</span>));
<span class="hljs-comment" style="color: rgb(117, 113, 94);">// Outputs: Your anonymized URL is: https://open-dereferrer.com/aHR0cHM6Ly93d3cuZ29vZ2xlLmNvbS8</span></pre>