<?php
/**
 * Created by PhpStorm.
 * User: tungnt
 * Date: 12/13/19
 * Time: 11:58
 */

namespace OneSite\HttpClient;

use GuzzleHttp\Client;
use OneSite\HttpClient\Tests\TestHttpResponse;

/**
 * Class HttpClient
 * @package OneSite\HttpClient
 */
abstract class HttpClient
{

    /**
     * @return mixed
     */
    abstract public function getHttpResponse();

    /**
     * HttpClient constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param HttpRequest $request
     * @return mixed
     */
    public function sendRequest(HttpRequest $request)
    {
        list($url, $method, $headers, $params) = $this->prepareRequestOptions($request);

        $client = new Client();

        $data = [
            'http_errors' => false,
            'verify' => false,
            'headers' => $headers
        ];

        if ($method == 'GET') {
            $data['query'] = $params;
        } else {
            $data['form_params'] = $params;
        }

        $response = $client->request($method, $url, $data);

        $httpResponseClass = $this->getHttpResponse();
        /**
         * @var TestHttpResponse $httpResponse
         */
        $httpResponse = new $httpResponseClass();

        $httpResponse->setRequest($request);
        $httpResponse->setHttpStatusCode($response->getStatusCode());
        $httpResponse->setHeaders($response->getHeaders());
        $httpResponse->setBody($response->getBody()->getContents());

        return $httpResponse;
    }

    /**
     * @param HttpRequest $request
     * @return array
     */
    protected function prepareRequestOptions(HttpRequest $request)
    {
        return [
            $request->getUrl(),
            $request->getMethod(),
            $request->getHeaders(),
            $request->getParams()
        ];
    }
}