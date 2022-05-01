<?php

namespace Lop\LopOpensdkPhp;

interface Client
{
    /**
     * @param Request $request
     * @param Options $options
     * @return Response
     * @throws SdkException
     */
    function execute($request, $options);
}