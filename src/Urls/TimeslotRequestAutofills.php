<?php

namespace Brezgalov\QueueApiClient\Urls;

use yii\base\Component;

/**
 * Class TimeslotRequestAutofills
 * @package Brezgalov\QueueApiClient\Urls
 *
 * @property-read string $list
 * @property-read string $create
 */
class TimeslotRequestAutofills extends Component
{
    /**
     * @return string
     */
    public function getList()
    {
        return 'timeslot-request-autofills/index';
    }

    /**
     * @return string
     */
    public function getCreate()
    {
        return 'timeslot-request-autofills/create';
    }
}