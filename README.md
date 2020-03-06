PHP HTTP client
=======================

```php
$testHttpClient = new \OneSite\HttpClient\Tests\TestHttpClient();

/**
 * @var \OneSite\HttpClient\Tests\TestHttpResponse $data
 */
$data = $testHttpClient->getEmployees();

var_dump(json_encode($data->getDecodedBody()));
```