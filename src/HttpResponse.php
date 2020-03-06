<?php
/**
 * Created by PhpStorm.
 * User: tungnt
 * Date: 12/13/19
 * Time: 11:58
 */

namespace OneSite\HttpClient;


/**
 * Class HttpResponse
 * @package OneSite\HttpClient
 */
class HttpResponse
{
    /**
     * @var HttpRequest The original request that returned this response.
     */
    protected $request;

    /**
     * @var string The raw body of the response from Graph.
     */
    protected $body;

    /**
     * @var int The HTTP status code response from Graph.
     */
    protected $httpStatusCode;

    /**
     * @var array The headers returned from Graph.
     */
    protected $headers;

    /**
     * @var array The decoded body of the Graph response.
     */
    protected $decodedBody = [];


    /**
     * HttpResponse constructor.
     * @param HttpRequest|null $request
     * @param string|null $body
     * @param int|null $httpStatusCode
     * @param array $headers
     */
    public function __construct(HttpRequest $request = null, string $body = null, int $httpStatusCode = null, array $headers = [])
    {
        $this->request = $request;
        $this->body = $body;
        $this->httpStatusCode = $httpStatusCode;
        $this->headers = $headers;
    }

    /**
     * @return HttpRequest
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param HttpRequest $request
     */
    public function setRequest(HttpRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body)
    {
        $this->body = $body;

        $this->setDecodedBody($this->body);
    }

    /**
     * @return int
     */
    public function getHttpStatusCode()
    {
        return !empty($this->httpStatusCode) ? $this->httpStatusCode : -1;
    }

    /**
     * @param int $httpStatusCode
     */
    public function setHttpStatusCode(int $httpStatusCode)
    {
        $this->httpStatusCode = $httpStatusCode;
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
    public function getDecodedBody()
    {
        return $this->decodedBody;
    }


    /**
     * @param $body
     */
    public function setDecodedBody($body)
    {
        $decodedBody = json_decode($body);

        switch ($this->getHttpStatusCode()) {
            case HttpStatusCode::STATUS_OK:
                $this->decodedBody = [
                    'data' => $decodedBody
                ];

                break;
            default:
                $this->decodedBody = [
                    'error' => [
                        'message' => $decodedBody
                    ]
                ];
        }
    }

    /**
     * Returns true if returned an error message.
     *
     * @return boolean
     */
    public function isError()
    {
        return isset($this->decodedBody['error']);
    }

    /**
     * @return mixed|null
     */
    public function getError()
    {
        if (!$this->isError()) {
            return null;
        }

        return $this->decodedBody['error'];
    }

}