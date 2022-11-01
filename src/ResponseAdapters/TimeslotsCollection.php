<?php

namespace Brezgalov\QueueApiClient\ResponseAdapters;

use Brezgalov\BaseApiClient\ResponseAdapters\BaseResponseAdapter;
use Brezgalov\QueueApiClient\ResponseAdapters\Dto\TimeslotDto;

/**
 * Class TimeslotsCollection
 * @package Brezgalov\QueueApiClient\ResponseAdapters
 */
class TimeslotsCollection extends BaseResponseAdapter implements \Iterator, \ArrayAccess
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

    /**
     * Whether a offset exists
     * @link https://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return bool true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     */
    public function offsetExists($offset)
    {
        return $this->getIsOk() && array_key_exists($offset, $this->responseData);
    }

    /**
     * Offset to retrieve
     * @link https://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     */
    public function offsetGet($offset)
    {
        return $this->getIsOk() ? $this->responseData[$offset] : null;
    }

    /**
     * Offset to set
     * @link https://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        throw new \Exception(self::class . " is a ReadOnly");
    }

    /**
     * Offset to unset
     * @link https://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     */
    public function offsetUnset($offset)
    {
        throw new \Exception(self::class . " is a ReadOnly");
    }
}
