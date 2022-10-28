<?php

namespace Brezgalov\QueueApiClient\Urls;

use yii\base\Component;

/**
 * Class Timeslots
 * @package Brezgalov\QueueApiClient\Urls
 *
 * @property-read string $listFormatted
 * @property-read string $submitTimeslot
 * @property-read string $dropTimeslot
 */
class Timeslots extends Component
{
    /**
     * @return string
     */
    public function getListFormatted(): string
    {
        return "timeslots/list-fmtd";
    }

    /**
     * @return string
     */
    public function getSubmitTimeslot(): string
    {
        return "timeslots/submit-fmtd";
    }

    /**
     * @return string
     */
    public function getDropTimeslot(): string
    {
        return "timeslots/drop";
    }
}