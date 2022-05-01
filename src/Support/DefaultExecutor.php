<?php

namespace Lop\LopOpensdkPhp\Support;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use Lop\LopOpensdkPhp\Executor;
use Lop\LopOpensdkPhp\SdkException;

class DefaultExecutor implements Executor
{
    /**
     * @var string
     */
    private $baseUri;

    /**
     * @param string $baseUri
     */
    public function __construct($baseUri)
    {
        $this->baseUri = $baseUri;
    }

    /**
     * @throws SdkException
     */
    function execute($request, $options)
    {
        $uri = $this->baseUri . $request->getPath();
        $httpRequest = new Request($request->getMethod(), $uri, $request->getHeaders(), $request->getBody());

        $client = new Client();
        try {
            $httpResponse = $client->send($httpRequest, [
                "query" => $request->getQueries(),
                "http_errors" => false
            ]);
        } catch (GuzzleException $e) {
            throw new SdkException("", 0, null, $e);
        }

        $response = new GenericResponse();
        $response->setSucceed($httpResponse->getStatusCode() == 200);
        $response->setStatus($httpResponse->getStatusCode());
        $response->setBody($httpResponse->getBody()->getContents());

        $traceIds = $httpResponse->getHeader("Lop-Trace-Id");
        if (count($traceIds) > 0) {
            $response->setTraceId($traceIds[0]);
        }

        return $response;
    }
}