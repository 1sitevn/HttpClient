<?php
/**
 * Created by PhpStorm.
 * User: tungnt
 * Date: 12/14/19
 * Time: 08:10
 */

namespace OneSite\HttpClient\Tests;


use OneSite\HttpClient\HttpRequest;

/**
 * Class TestHttpRequest
 * @package OneSite\HttpClient\Test
 */
class TestHttpRequest extends HttpRequest
{

    /**
     * TestHttpRequest constructor.
     * @param string|null $url
     * @param string|null $method
     * @param array $headers
     * @param array $params
     */
    public function __construct(string $url = null, string $method = null, array $headers = [], array $params = [])
    {
        parent::__construct($url, $method, $headers, $params);
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers)
    {
        $this->headers = array_merge($headers, [
            'Token' => md5(json_encode($this->getParams()))
        ]);
    }


}