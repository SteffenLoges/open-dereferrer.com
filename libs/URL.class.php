<?php

namespace OpenDereferrer;

class URL
{

    protected $parsedURL = null;

    public function __construct($url)
    {
        $this->parsedURL = $this->parse($url);
    }

    // @return bool true if the URL is valid
    protected function parse($url)
    {

        // check if url is base64 encoded
        if ($this->isBase64Encoded($url)) {
            $url = $this->decodeBase64($url);
        }

        // Check if the url starts with http[s]:// and add if necessary
        if (!preg_match('/^(http|https):\/\//', $url)) {
            $url = 'http://' . $url;
        }

        // Uncomment to force percent-encoded URLs
        // if (!filter_var($url, FILTER_VALIDATE_URL)) {
        //     return null;
        // }

        return parse_url($url);

    }

    // checks if the URL is valid AND the host contains a dot as a simple check to prevent random strings without tld's
    // @return bool true if the URL is valid
    public function isValid()
    {
        return $this->parsedURL !== null && str_contains($this->parsedURL['host'], '.');
    }

    public function getHost()
    {
        return $this->parsedURL['host'];
    }

    public function getFullURL()
    {

        $fullURL = '';

        if (isset($this->parsedURL['scheme'])) {
            $fullURL .= $this->parsedURL['scheme'] . '://';
        }

        if (isset($this->parsedURL['user'])) {
            $fullURL .= $this->parsedURL['user'];
        }

        if (isset($this->parsedURL['pass'])) {
            $fullURL .= ':' . $this->parsedURL['pass'];
        }

        if (isset($this->parsedURL['user']) || isset($this->parsedURL['pass'])) {
            $fullURL .= '@';
        }

        if (isset($this->parsedURL['host'])) {
            $fullURL .= $this->parsedURL['host'];
        }

        if (isset($this->parsedURL['port'])) {
            $fullURL .= ':' . $this->parsedURL['port'];
        }

        if (isset($this->parsedURL['path'])) {
            $fullURL .= $this->parsedURL['path'];
        }

        if (isset($this->parsedURL['query'])) {
            $fullURL .= '?' . $this->parsedURL['query'];
        }

        if (isset($this->parsedURL['fragment'])) {
            $fullURL .= '#' . $this->parsedURL['fragment'];
        }

        return $fullURL;

    }

    // @returns base64 encoded url-safe string
    private function _encodeBase64($url)
    {
        return rtrim(strtr(base64_encode($url), '+/', '-_'), '=');
    }

    public function encodeBase64()
    {
        return $this->_encodeBase64($this->getFullURL());
    }

    public function decodeBase64($encodedURL, $strict = false)
    {
        // no STR_PAD_RIGHT needed, base64_decode handles padding automatically
        return base64_decode(strtr($encodedURL, '-_', '+/'), $strict);
    }

    public function isBase64Encoded($url)
    {
        return $this->_encodeBase64($this->decodeBase64($url, true)) === $url;
    }

}