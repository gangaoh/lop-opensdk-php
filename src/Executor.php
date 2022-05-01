<?php

namespace Lop\LopOpensdkPhp;

interface Executor
{
    /**
     * @param Request $request
     * @param Options $options
     * @return Response
     * @throws SdkException
     */
    function execute($request, $options);
}