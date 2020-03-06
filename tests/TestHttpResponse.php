<?php
/**
 * Created by PhpStorm.
 * User: tungnt
 * Date: 12/14/19
 * Time: 08:06
 */

namespace OneSite\HttpClient\Tests;


use OneSite\HttpClient\HttpRequest;
use OneSite\HttpClient\HttpResponse;
use OneSite\HttpClient\HttpResponseErrorCode;
use OneSite\HttpClient\HttpStatusCode;

/**
 * Class TestHttpResponse
 * @package OneSite\HttpClient\Test
 */
class TestHttpResponse extends HttpResponse
{

    /**
     * TestHttpResponse constructor.
     * @param HttpRequest|null $request
     * @param string|null $body
     * @param int|null $httpStatusCode
     * @param array $headers
     */
    public function __construct(HttpRequest $request = null, string $body = null, int $httpStatusCode = null, array $headers = [])
    {
        parent::__construct($request, $body, $httpStatusCode, $headers);
    }


    /**
     * @param $body
     * @throws \Exception
     */
    public function setDecodedBody($body)
    {
        $decodedBody = json_decode($body);

        switch ($this->getHttpStatusCode()) {
            case HttpStatusCode::STATUS_OK:
                if (!empty($decodedBody->data)) {
                    $this->decodedBody = [
                        'data' => $decodedBody->data
                    ];

                    break;
                }

                $this->decodedBody = [
                    'error' => [
                        'code' => HttpResponseErrorCode::CODE_1104,
                        'errors' => []
                    ]
                ];

                break;
            default:
                $this->decodedBody = [
                    'error' => [
                        'code' => HttpResponseErrorCode::CODE_1000,
                        'errors' => []
                    ]
                ];
        }
    }
}