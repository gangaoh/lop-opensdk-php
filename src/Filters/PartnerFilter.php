<?php

namespace Lop\LopOpensdkPhp\Filters;

use Lop\LopOpensdkPhp\Filter;
use Lop\LopOpensdkPhp\SdkException;

class PartnerFilter implements Filter
{
    /**
     * @var string
     */
    private $appKey;

    /**
     * @var string
     */
    private $appSecret;

    /**
     * @param string $appKey
     * @param string $appSecret
     */
    public function __construct($appKey, $appSecret)
    {
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
    }

    /**
     * @throws SdkException
     */
    function doFilter($request, $options, $chain)
    {
        $request->setHeader("lop-tz", strval(date("Z") / 3600));

        $timestamp = date("Y-m-d H:i:s");
        $content = implode("", array(
            $this->appSecret,
            "access_token", "",
            "app_key", $this->appKey,
            "method", $request->getPath(),
            "param_json", $request->getBody(),
            "timestamp", $timestamp,
            "v", "2.0",
            $this->appSecret
        ));
        $sign = Utils::sign($options->getAlgorithm(), $content, $this->appSecret);

        $request->setQuery("app_key", $this->appKey);
        $request->setQuery("timestamp", $timestamp);
        $request->setQuery("v", "2.0");
        $request->setQuery("sign", $sign);
        $request->setQuery("algorithm", $options->getAlgorithm());

        return $chain->doFilter($request, $options);
    }
}