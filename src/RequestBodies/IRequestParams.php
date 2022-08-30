<?php

namespace Brezgalov\QueueApiClient\RequestBodies;

interface IRequestParams
{
    /**
     * @return array
     */
    public function getParams();
}