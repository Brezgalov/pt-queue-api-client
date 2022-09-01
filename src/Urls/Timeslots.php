<?php

namespace Brezgalov\QueueApiClient\Urls;

use yii\base\Component;

/**
 * Class Timeslots
 * @package Brezgalov\QueueApiClient\Urls
 *
 * @property-read string $submitTimeslot
 */
class Timeslots extends Component
{
    /**
     * @return string
     */
    public function getSubmitTimeslot()
    {
        return "timeslots/submit";
    }
}