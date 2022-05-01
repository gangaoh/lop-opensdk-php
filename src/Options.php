<?php

namespace Lop\LopOpensdkPhp;

class Options
{
    const MD5_SALT = "md5-salt";
    const SM3_SALT = "sm3-salt";
    const HMAC_MD5 = "HMacMD5";
    const HMAC_SHA1 = "HMacSHA1";
    const HMAC_SHA256 = "HMacSHA256";
    const HMAC_SHA512 = "HMacSHA512";

    /**
     * @var string
     */
    private $algorithm;

    public function __construct()
    {
        $this->algorithm = self::MD5_SALT;
    }


    /**
     * @return string
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }

    /**
     * @param string $algorithm
     */
    public function setAlgorithm($algorithm)
    {
        $this->algorithm = $algorithm;
    }
}