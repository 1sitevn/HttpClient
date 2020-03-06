<?php
/**
 * Created by PhpStorm.
 * User: tungnt
 * Date: 12/13/19
 * Time: 11:58
 */

namespace OneSite\HttpClient;


/**
 * Class HttpRequest
 * @package OneSite\HttpClient
 */
class HttpRequest
{

    /**
     * @var
     */
    protected $method;


    /**
     * @var
     */
    protected $url;

    /**
     * @var array The headers to send with this request.
     */
    protected $headers = [];


    /**
     * @var array
     */
    protected $params = [];


    /**
     * HttpRequest constructor.
     * @param string|null $url
     * @param string|null $method
     * @param array $headers
     * @param array $params
     */
    public function __construct(string $url = null, string $method = null, array $headers = [], array $params = [])
    {
        $this->setUrl($url);
        $this->setMethod($method);
        $this->setParams($params);
        $this->setHeaders($headers);
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params)
    {
        $this->params = $params;
    }

}