<?php
/**
 * Created by PhpStorm.
 * User: tungnt
 * Date: 12/14/19
 * Time: 08:33
 */

namespace OneSite\HttpClient;


/**
 * Class HttpStatusCode
 * @package OneSite\HttpClient
 */
class HttpStatusCode
{
    /**
     * Successful.
     */
    const STATUS_OK = 200;
    /**
     * Created.
     */
    const STATUS_CREATED = 201;
    /**
     * Bad Request:
     * Bad input parameter. Error message should indicate which one and why.
     */
    const STATUS_BAD_REQUEST = 400;
    /**
     * Unauthorized:
     * The client passed in the invalid Auth token. Client should refresh the token and then try again.
     */
    const STATUS_UNAUTHORIZED = 401;
    /**
     * Forbidden:
     * Customer doesn’t exist.
     * Application not registered.
     * Application try to access to properties not belong to an App.
     * Application try to trash/purge root node.
     * Application try to update contentProperties.
     * Operation is blocked (for third-party apps).
     * Customer account over quota.
     */
    const STATUS_FORBIDDEN = 403;
    /**
     * Not Found:
     * Resource not found.
     */
    const STATUS_NOT_FOUND = 404;
    /**
     * Method Not Allowed:
     * The resource doesn't support the specified HTTP verb.
     */
    const STATUS_METHOD_NOT_ALLOWED = 405;
    /**
     * Conflict:
     */
    const STATUS_CONFLICT = 409;
    /**
     * Length Required:
     * The Content-Length header was not specified.
     */
    const STATUS_LENGTH_REQUIRED = 411;
    /**
     * Precondition Failed
     */
    const STATUS_PRECONDITION_FAILED = 412;
    /**
     * Unprocessable Entity Explained:
     * Validation Failed.
     */
    const STATUS_UNPROCESSABLE_ENTITY = 422;
    /**
     * Too Many Requests:
     * Too many request for rate limiting.
     */
    const STATUS_TOO_MANY_REQUESTS = 429;
    /**
     * Internal Server Error:
     * Servers are not working as expected. The request is probably valid but needs to be requested again later.
     */
    const STATUS_INTERNAL_SERVER_ERROR = 500;
    /**
     * Service Unavailable.
     */
    const STATUS_SERVICE_UNAVAILABLE = 503;
}