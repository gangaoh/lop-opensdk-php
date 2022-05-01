<?php

namespace Lop\LopOpensdkPhp;

interface FilterChain
{
    /**
     * @param Request $request
     * @param Options $options
     * @return Response
     * @throws SdkException
     */
    function doFilter($request, $options);
}