<?php

namespace Lop\LopOpensdkPhp\Support;

use Lop\LopOpensdkPhp\Filter;
use Lop\LopOpensdkPhp\Request;

class GenericRequest implements Request
{
    /**
     * @var string
     */
    private $domain;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $method;

    /**
     * @var string[]
     */
    private $queries;

    /**
     * @var string[]
     */
    private $headers;

    /**
     * @var Filter[]
     */
    private $filters;

    /**
     * @var string
     */
    private $body;

    /**
     * @var string
     */
    private $requestId;

    /**
     * @var string
     */
    private $responseType;

    public function __construct()
    {
        $this->queries = array();
        $this->headers = array();
        $this->filters = array();
    }


    function getDomain()
    {
        return $this->domain;
    }

    function setDomain($domain)
    {
        $this->domain = $domain;
    }

    function getPath()
    {
        return $this->path;
    }

    function setPath($path)
    {
        $this->path = $path;
    }

    function getMethod()
    {
        return $this->method;
    }

    function setMethod($method)
    {
        $this->method = $method;
    }

    function hasQuery($key)
    {
        return array_key_exists($key, $this->queries);
    }

    function getQuery($key)
    {
        return $this->queries[$key];
    }

    function setQuery($key, $value)
    {
        $this->queries[$key] = $value;
    }

    function getQueries()
    {
        return $this->queries;
    }

    function hasHeader($key)
    {
        return array_key_exists($key, $this->headers);
    }

    function getHeader($key)
    {
        return $this->headers[$key];
    }

    function setHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }

    function getHeaders()
    {
        return $this->headers;
    }

    function addFilter($filter)
    {
        $this->filters[] = $filter;
    }

    function getFilters()
    {
        return $this->filters;
    }

    function getEntity()
    {
        return null;
    }

    function getBody()
    {
        return $this->body;
    }

    function setBody($body)
    {
        $this->body = $body;
    }

    function getRequestId()
    {
        return $this->requestId;
    }

    function setRequestId($requestId)
    {
        $this->requestId = $requestId;
    }

    /**
     * @return string
     */
    function getResponseType()
    {
        return $this->responseType;
    }

    /**
     * @param string $responseType
     * @return void
     */
    function setResponseType($responseType)
    {
        $this->responseType = $responseType;
    }
}