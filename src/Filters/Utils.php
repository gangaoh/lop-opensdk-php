<?php

namespace Lop\LopOpensdkPhp\Filters;

use Lop\LopOpensdkPhp\Options;
use Lop\LopOpensdkPhp\SdkException;

abstract class Utils
{
    /**
     * Signature data with given algorithm and secret.
     *
     * @param string $algorithm
     * @param string $secret
     * @param string $data
     * @return string
     * @throws SdkException
     */
    public static function sign($algorithm, $data, $secret)
    {
        if ($algorithm == Options::MD5_SALT) {
            return md5($data);
        } else if ($algorithm == Options::SM3_SALT) {
            throw new SdkException("Algorithm sm3-salt not supported yet");
        } else if ($algorithm == Options::HMAC_MD5) {
            return base64_encode(hash_hmac("md5", $data, $secret, true));
        } else if ($algorithm == Options::HMAC_SHA1) {
            return base64_encode(hash_hmac("sha1", $data, $secret, true));
        } else if ($algorithm == Options::HMAC_SHA256) {
            return base64_encode(hash_hmac("sha256", $data, $secret, true));
        } else if ($algorithm == Options::HMAC_SHA512) {
            return base64_encode(hash_hmac("sha512", $data, $secret, true));
        }
        throw new SdkException("Algorithm " . $algorithm . " not supported yet");
    }
}