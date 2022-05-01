<?php

namespace Lop\LopOpensdkPhp;

interface ExecutorFactory
{
    /**
     * @param string $baseUri
     * @return Executor
     * @throws SdkException
     */
    function create($baseUri);
}