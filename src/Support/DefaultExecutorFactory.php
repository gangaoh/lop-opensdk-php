<?php

namespace Lop\LopOpensdkPhp\Support;

use GuzzleHttp\Client;
use Lop\LopOpensdkPhp\ExecutorFactory;

class DefaultExecutorFactory implements ExecutorFactory
{
    function create($baseUri)
    {
        return new DefaultExecutor($baseUri);
    }
}