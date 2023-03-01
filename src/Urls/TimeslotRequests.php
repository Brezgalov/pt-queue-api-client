<?php

namespace Brezgalov\QueueApiClient\Urls;

use yii\base\Component;

/**
 * Class TimeslotRequests
 * @package Brezgalov\QueueApiClient\Urls
 *
 * @property-read string createTimeRequest
 */
class TimeslotRequests extends Component
{
    /**
     * @return string
     */
    public function getCreateTimeRequest()
    {
        return "timeslot-requests/create-time-request";
    }

    /**
     * @return string
     */
    public function getCreateMoveTimeRequest()
    {
        return "timeslot-requests/create-move-request";
    }
}
