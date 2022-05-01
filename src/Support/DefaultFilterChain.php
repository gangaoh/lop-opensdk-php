<?php

namespace Lop\LopOpensdkPhp\Support;

use Lop\LopOpensdkPhp\Executor;
use Lop\LopOpensdkPhp\Filter;
use Lop\LopOpensdkPhp\FilterChain;
use Lop\LopOpensdkPhp\SdkException;

class DefaultFilterChain implements FilterChain
{
    /**
     * @var Executor
     */
    private $executor;

    /**
     * @var Filter[]
     */
    private $filters;

    /**
     * @var int
     */
    private $position;

    /**
     * @param Executor $executor
     * @param Filter[] $filters
     */
    public function __construct($executor, $filters)
    {
        $this->executor = $executor;
        $this->filters = $filters;
        $this->position = 0;
    }

    /**
     * @throws SdkException
     */
    function doFilter($request, $options)
    {
        if ($this->position < count($this->filters)) {
            $filter = $this->filters[$this->position];
            $this->position++;
            return $filter->doFilter($request, $options, $this);
        } else {
            return $this->executor->execute($request, $options);
        }
    }
}