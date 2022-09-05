<?php

namespace Brezgalov\QueueApiClient\Urls;

use yii\base\Component;

/**
 * Class Timeslots
 * @package Brezgalov\QueueApiClient\Urls
 *
 * @property-read string $submitTimeslot
 * @property-read string $dropTimeslot
 */
class Timeslots extends Component
{
    /**
     * @return string
     */
    public function getSubmitTimeslot()
    {
        return "timeslots/submit-fmtd";
    }

    /**
     * @return string
     */
    public function getDropTimeslot()
    {
        return "timeslots/drop";
    }
}