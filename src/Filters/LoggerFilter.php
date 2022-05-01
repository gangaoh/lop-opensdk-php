<?php

namespace Lop\LopOpensdkPhp\Filters;

use Lop\LopOpensdkPhp\Filter;
use Lop\LopOpensdkPhp\SdkException;

class LoggerFilter implements Filter
{

    /**
     * @var resource
     */
    private $file;

    /**
     * @param resource $file
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    function doFilter($request, $options, $chain)
    {
        $this->printf("[%s, Request  ] Domain: %s, Path: %s, Method: %s", $request->getRequestId(),
            $request->getDomain(), $request->getPath(), $request->getMethod());
        $this->printf("[%s, Request  ] Queries: %s", $request->getRequestId(), json_encode($request->getQueries()));
        $this->printf("[%s, Request  ] Headers: %s", $request->getRequestId(), json_encode($request->getHeaders()));
        $this->printf("[%s, Request  ] Body: %s", $request->getRequestId(), $request->getBody());

        try {
            $response = $chain->doFilter($request, $options);
        } catch (SdkException $e) {
            $this->printf("[%s, Response ] Error: %s", $e->getMessage());
            throw $e;
        }

        $this->printf("[%s, Response ] Succeed: %t, TraceId: %s, EnDesc: %s, ZhDesc: %s, Code: %d, Status: %d",
            $request->getRequestId(), $response->isSucceed(), $response->getTraceId(),
            $response->getEnDesc(), $response->getZhDesc(), $response->getCode(), $response->getStatus());
        $this->printf("[%s, Response ] Body: %s", $request->getRequestId(), $response->getBody());
        
        return $response;
    }

    /**
     * @param string $format
     * @param mixed ...$values
     * @return void
     */
    private function printf($format, ...$values)
    {
        fwrite($this->file, date("Y/m/d H:i:s"));
        fwrite($this->file, " ");
        fwrite($this->file, sprintf($format, $values));
        fwrite($this->file, "\n");
    }
}