<?php

namespace Lop\LopOpensdkPhp;

use Exception;

class SdkException extends Exception
{
    /**
     * @var Response $response
     */
    private $response;

    public function __construct($message = "", $code = 0, $response = null, $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->response = $response;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}