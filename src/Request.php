<?php

namespace Lop\LopOpensdkPhp;

interface Request
{

    /**
     * @return string
     */
    function getDomain();

    /**
     * @param string $domain
     * @return void
     */
    function setDomain($domain);

    /**
     * @return string
     */
    function getPath();

    /**
     * @param string $path
     * @return void
     */
    function setPath($path);

    /**
     * @return string
     */
    function getMethod();

    /**
     * @param string $method
     * @return void
     */
    function setMethod($method);

    /**
     * @param string $key
     * @return bool
     */
    function hasQuery($key);

    /**
     * @param string $key
     * @return string
     */
    function getQuery($key);

    /**
     * @param string $key
     * @param string $value
     * @return void
     */
    function setQuery($key, $value);

    /**
     * @return string[]
     */
    function getQueries();

    /**
     * @param string $key
     * @return bool
     */
    function hasHeader($key);

    /**
     * @param string $key
     * @return string
     */
    function getHeader($key);

    /**
     * @param string $key
     * @param string $value
     * @return void
     */
    function setHeader($key, $value);

    /**
     * @return string[]
     */
    function getHeaders();

    /**
     * @param Filter $filter
     * @return void
     */
    function addFilter($filter);

    /**
     * @return Filter[]
     */
    function getFilters();

    /**
     * @return mixed
     */
    function getEntity();

    /**
     * @return string
     */
    function getBody();

    /**
     * @param string $body
     * @return void
     */
    function setBody($body);

    /**
     * @return string
     */
    function getRequestId();

    /**
     * @param string $requestId
     * @return void
     */
    function setRequestId($requestId);

    /**
     * @return string
     */
    function getResponseType();

    /**
     * @param string $responseType
     * @return void
     */
    function setResponseType($responseType);
}