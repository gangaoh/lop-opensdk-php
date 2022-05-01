<?php

namespace Lop\LopOpensdkPhp;

interface Response
{
    /**
     * @return bool
     */
    function isSucceed();

    /**
     * @param bool $succeed
     * @return void
     */
    function setSucceed($succeed);

    /**
     * @return string
     */
    function getTraceId();

    /**
     * @param string $traceId
     * @return void
     */
    function setTraceId($traceId);

    /**
     * @return string
     */
    function getZhDesc();

    /**
     * @param string $zhDesc
     * @return void
     */
    function setZhDesc($zhDesc);

    /**
     * @return string
     */
    function getEnDesc();

    /**
     * @param string $enDesc
     * @return void
     */
    function setEnDesc($enDesc);

    /**
     * @return int
     */
    function getCode();

    /**
     * @param int $code
     * @return void
     */
    function setCode($code);

    /**
     * @return int
     */
    function getStatus();

    /**
     * @param int $status
     * @return void
     */
    function setStatus($status);

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
     * @return mixed
     */
    function getEntity();

    /**
     * @param mixed $entity
     * @return void
     */
    function setEntity($entity);
}