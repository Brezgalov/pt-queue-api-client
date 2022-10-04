<?php

namespace Brezgalov\QueueApiClient\ResponseAdapters;

use Brezgalov\BaseApiClient\ResponseAdapters\BaseResponseAdapter;
use Brezgalov\QueueApiClient\ResponseAdapters\Dto\TimeslotDto;

/**
 * Class TimeslotsCollection
 * @package Brezgalov\QueueApiClient\ResponseAdapters
 */
class TimeslotsCollection extends BaseResponseAdapter implements \Iterator
{
    /**
     * @var int
     */
    protected $position = 0;

    /**
     * reset position
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @return TimeslotDto
     */
    public function current()
    {
        if (!is_array($this->responseData) || !array_key_exists($this->position, $this->responseData)) {
            return null;
        }

        return new TimeslotDto($this->responseData[$this->position]);
    }

    /**
     * @return int
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * change position
     */
    public function next()
    {
        $this->position += 1;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return is_array($this->responseData) && array_key_exists($this->position, $this->responseData);
    }
}
