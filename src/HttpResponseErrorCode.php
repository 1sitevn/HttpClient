<?php
/**
 * Created by PhpStorm.
 * User: tungnt
 * Date: 12/14/19
 * Time: 09:11
 */

namespace OneSite\HttpClient;


/**
 * Class HttpResponseErrorCode
 * @package OneSite\HttpClient
 */
class HttpResponseErrorCode
{
    /**
     * 10XX: Main App Errors
     */
    const CODE_1000 = 1000; // App Server Error, please contact the admin
    const CODE_1001 = 1001; // Missing Headers
    const CODE_1002 = 1002; // Missing Parameters
    const CODE_1003 = 1003; // Invalid offset or limit
    const CODE_1004 = 1004; // Invalid Locale
    const CODE_1005 = 1005; // Invalid Timezone
    const CODE_1006 = 1006; // You exceeded the limit of requests per minute, Please try again after sometime.

    /**
     * 11XX: Http Errors
     */
    const CODE_1100 = 1100; // Unauthorized
    const CODE_1101 = 1101; // Not authorized to access
    const CODE_1102 = 1102; // Unprocessable Entity
    const CODE_1103 = 1103; // Authentication Failed
    const CODE_1104 = 1104; // Not Found

    /**
     * 12XX: Auth Errors
     */
    const CODE_1200 = 1200; // Your session is expired, please login again
    const CODE_1201 = 1201; // Your sessions is invalid: JWT verification error
    const CODE_1202 = 1202; // Your sessions is invalid: Error encountered while decoding JWT token
    const CODE_1203 = 1203; // Your sessions token is invalid
    const CODE_1204 = 1204; // You are Unauthorized, Please login
    const CODE_1205 = 1205; // Authentication Error, User Not found

    /**
     * 13XX: Session Errors
     */
    const CODE_1300 = 1300; // Login is incorrect.
}
