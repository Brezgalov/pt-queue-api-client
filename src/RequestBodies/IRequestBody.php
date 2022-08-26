<?php

namespace Brezgalov\QueueApiClient\RequestBodies;

interface IRequestBody
{
    /**
     * @return array
     */
    public function getBody();
}