<?php
/**
 * Created by PhpStorm.
 * User: tungnt
 * Date: 12/14/19
 * Time: 08:05
 */

namespace OneSite\HttpClient\Tests;


use OneSite\HttpClient\HttpClient;

/**
 * Class TestHttpClient
 * @package OneSite\HttpClient\Tests
 */
class TestHttpClient extends HttpClient
{
    /**
     * @var string
     */
    private $baseUrl;
    /**
     * @var string
     */
    private $apiKey;


    /**
     * TestHttpClient constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->baseUrl = 'http://dummy.restapiexample.com/api/v1';
        $this->apiKey = 'xxx';
    }


    /**
     * @return mixed|string
     */
    public function getHttpResponse()
    {
        return TestHttpResponse::class;
    }

    /**
     * @return mixed
     */
    public function getEmployees()
    {
        $url = $this->baseUrl . '/employees?api_key=' . $this->apiKey;

        $params = [
            'request_id' => uniqid()
        ];

        $httpRequest = new TestHttpRequest($url, 'GET', [], $params);

        return $this->sendRequest($httpRequest);

    }
}