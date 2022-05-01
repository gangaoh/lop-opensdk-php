<?php

namespace Lop\LopOpensdkPhp\Filters;

use Lop\LopOpensdkPhp\Filter;

class ErrorResponseFilter implements Filter
{

    const ERROR_RESPONSE_PATTERN = "/^{\"error_response\":{\"en_desc\":\"(.*)\",\"zh_desc\":\"(.*)\",\"code\":(.*)}}$/";

    function doFilter($request, $options, $chain)
    {
        $response = $chain->doFilter($request, $options);
        $matches = array();
        if (preg_match(self::ERROR_RESPONSE_PATTERN, $response->getBody(), $matches) === 1) {
            $response->setSucceed(false);
            $response->setEnDesc($matches[1]);
            $response->setZhDesc($matches[2]);
            $response->setCode(intval($matches[3]));
        }
        return $response;
    }
}