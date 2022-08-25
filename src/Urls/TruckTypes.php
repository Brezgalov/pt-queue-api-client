<?php

namespace Brezgalov\QueueApiClient\Urls;

use yii\base\Component;

/**
 * Class TruckTypes
 * @package Brezgalov\QueueApiClient\Urls
 *
 * @property-read string $list
 */
class TruckTypes extends Component
{
    /**
     * @return string
     */
    public function getList()
    {
        return 'truck-types/list';
    }
}