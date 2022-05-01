<?php

namespace Lop\LopOpensdkPhp\Support;

use Lop\LopOpensdkPhp\Client;
use Lop\LopOpensdkPhp\ExecutorFactory;
use Lop\LopOpensdkPhp\SdkException;
use Lop\LopOpensdkPhp\Version;

class DefaultClient implements Client
{
    private $baseUri;

    /**
     * @var ExecutorFactory
     */
    private $executorFactory;

    public function __construct($baseUri)
    {
        $this->baseUri = $baseUri;
        $this->executorFactory = new DefaultExecutorFactory();
    }

    /**
     * @throws SdkException
     */
    function execute($request, $options)
    {
        if (empty($request->getRequestId())) {
            $request->setRequestId(uniqid());
        }

        if (empty($request->getBody())) {
            $request->setBody(json_encode($request->getEntity()));
        }

        if (!$request->hasQuery("LOP-DN")) {
            $request->setQuery("LOP-DN", $request->getDomain());
        }

        if (!$request->hasHeader("User-Agent")) {
            $request->setHeader("User-Agent", "lop-opensdk/php@" . Version::VERSION);
        }

        $executor = $this->executorFactory->create($this->baseUri);

        $chain = new DefaultFilterChain($executor, $request->getFilters());
        $response = $chain->doFilter($request, $options);

        if (!$response->isSucceed()) {
            return $response;
        }

        if (empty($request->getResponseType())) {
            return $response;
        }

        $entity = json_decode($response->getBody());
        if (json_last_error() != JSON_ERROR_NONE) {
            throw new SdkException("json decode failed", 0, $response);
        }
        if (!settype($entity, $request->getResponseType())) {
            throw new SdkException("set entity to response type failed", 0, $response);
        }

        $response->setEntity($entity);

        return $response;
    }

    /**
     * @param ExecutorFactory $executorFactory
     */
    public function setExecutorFactory($executorFactory)
    {
        $this->executorFactory = $executorFactory;
    }
}