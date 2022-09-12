<?php

namespace Brezgalov\QueueApiClient\Urls;

use yii\base\Component;

/**
 * Class Pages
 * @package Brezgalov\QueueApiClient\Urls
 *
 * @property-read string $myTimeslots
 */
class Pages extends Component
{
    /**
     * @return string
     */
    public function getMyTimeslots()
    {
        return 'pages/my-timeslots';
    }
}