<?php

namespace Brezgalov\QueueApiClient\ResponseAdapters;

use Brezgalov\BaseApiClient\ResponseAdapters\BaseResponseAdapter;
use Brezgalov\QueueApiClient\ResponseAdapters\Dto\TimeslotRequestDto;

class TimeslotRequest extends BaseResponseAdapter
{
    /**
     * @return TimeslotRequestDto[]
     */
    public function getRequests()
    {
        if (empty($this->responseData)) {
            return [];
        }

        $result = [];
        foreach ($this->responseData as $item) {
            $result[] = new TimeslotRequestDto($item);
        }

        return $result;
    }
}