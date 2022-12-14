<?php

namespace Maxolex\ScaffoldInterface\Http;

/**
 * Class Request.
 *
 * @author Maxolex Togolais <maxolex12@gmail.com>
 */
class Request
{
    /**
     * Request.
     *
     * @var array
     */
    protected $request;

    /**
     * Set request.
     *
     * @param array $request
     *
     * @return void
     */
    public function setRequest(array $request)
    {
        $this->request = $request;
    }

    /**
     * Get request.
     *
     * @return array $request
     */
    public function getRequest()
    {
        return $this->request;
    }
}
