<?php

namespace Lop\LopOpensdkPhp\Support;

use Lop\LopOpensdkPhp\Response;

class GenericResponse implements Response
{

    /**
     * @var bool
     */
    private $succeed;

    /**
     * @var string
     */
    private $traceId;

    /**
     * @var string
     */
    private $zhDesc;

    /**
     * @var string
     */
    private $enDesc;

    /**
     * @var int
     */
    private $code;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $body;

    /**
     * @var mixed
     */
    private $entity;

    function isSucceed()
    {
        return $this->succeed;
    }

    function setSucceed($succeed)
    {
        $this->succeed = $succeed;
    }

    function getTraceId()
    {
        return $this->traceId;
    }

    function setTraceId($traceId)
    {
        $this->traceId = $traceId;
    }

    function getZhDesc()
    {
        return $this->zhDesc;
    }

    function setZhDesc($zhDesc)
    {
        $this->zhDesc = $zhDesc;
    }

    function getEnDesc()
    {
        return $this->enDesc;
    }

    function setEnDesc($enDesc)
    {
        $this->enDesc = $enDesc;
    }

    function getCode()
    {
        return $this->code;
    }

    function setCode($code)
    {
        $this->code = $code;
    }

    function getStatus()
    {
        return $this->status;
    }

    function setStatus($status)
    {
        $this->status = $status;
    }

    function getBody()
    {
        return $this->body;
    }

    function setBody($body)
    {
        $this->body = $body;
    }

    function getEntity()
    {
        return $this->entity;
    }

    function setEntity($entity)
    {
        $this->entity = $entity;
    }
}