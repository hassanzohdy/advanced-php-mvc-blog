<?php

namespace System\Http;

class Request
{
     /**
     * Url
     *
     * @var string
     */
    private $url;

     /**
     * Base Url
     *
     * @var string
     */
    private $baseUrl;

     /**
     * Uploaded Files Container
     *
     * @var array
     */
    private $files = [];

     /**
     * Prepare url
     *
     * @return void
     */
    public function prepareUrl()
    {
        $script = dirname($this->server('SCRIPT_NAME'));

        $requestUri = $this->server('REQUEST_URI');

        if (strpos($requestUri, '?') !== false) {
            list($requestUri, $queryString) = explode('?' , $requestUri);
        }

        $this->url = rtrim(preg_replace('#^'.$script.'#', '' , $requestUri), '/');

        if (! $this->url) {
            $this->url = '/';
        }

        $this->baseUrl = $this->server('REQUEST_SCHEME') . '://' . $this->server('HTTP_HOST') . $script . '/';
    }

     /**
     * Get Value from _GET by the given key
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        // just remove any white space if there is a value
        $value = array_get($_GET, $key, $default);

        if (is_array($value)) {
            $value = array_filter($value);
        } else {
            $value = trim($value);
        }

        return $value;
    }

     /**
     * Get Value from _POST by the given key
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function post($key, $default = null)
    {
        // just remove any white space if there is a value
        $value = array_get($_POST, $key, $default);
        if (is_array($value)) {
            $value = array_filter($value);
        } else {
            $value = trim($value);
        }

        return $value;
    }

     /**
     * Set Value To _POST For the given key
     *
     * @param string $key
     * @param mixed $valuet
     * @return mixed
     */
    public function setPost($key, $value)
    {
        $_POST[$key] = $value;
    }

     /**
     * Get the uploaded file object for the given input
     *
     * @param string $input
     * @return \System\Http\UploadedFile
     */
    public function file($input)
    {
        if (isset($this->files[$input])) {
            return $this->files[$input];
        }

        $uploadedFile = new UploadedFile($input);

        $this->files[$input] = $uploadedFile;

        return $this->files[$input];
    }

     /**
     * Get Value from _SERVER by the given key
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function server($key, $default = null)
    {
        return array_get($_SERVER, $key, $default);
    }

     /**
     * Get Current Request Method
     *
     * @return string
     */
    public function method()
    {
        return $this->server('REQUEST_METHOD');
    }

     /**
     * Get The referer link
     *
     * @return string
     */
    public function referer()
    {
        return $this->server('HTTP_REFERER');
    }

     /**
     * Get full url of the script
     *
     * @return string
     */
    public function baseUrl()
    {
        return $this->baseUrl;
    }

     /**
     * Get Only relative url (clean url)
     *
     * @return string
     */
    public function url()
    {
        return $this->url;
    }
}