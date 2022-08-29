<?php

namespace Brezgalov\QueueApiClient\ResponseAdapters;

use Brezgalov\BaseApiClient\ResponseAdapters\BaseResponseAdapter;
use Brezgalov\QueueApiClient\ResponseAdapters\Dto\TimeslotRequestDto;

class TimeslotRequestsCollection extends BaseResponseAdapter
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
        foreach ($this->responseData as $key => $item) {
            // Дебильный интерфейс в котором приходит то объект то массив, пздц
            if (!is_integer($key)) {
                $result[] = new TimeslotRequestDto($this->responseData);
                break;
            }

            $result[] = new TimeslotRequestDto($item);
        }

        return $result;
    }
}