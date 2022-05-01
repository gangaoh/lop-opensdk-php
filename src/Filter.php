<?php

namespace Lop\LopOpensdkPhp;

interface Filter
{
    /**
     * @param Request $request
     * @param Options $options
     * @param FilterChain $chain
     * @return Response
     * @throws SdkException
     */
    function doFilter($request, $options, $chain);
}