<?php

namespace Brezgalov\QueueApiClient\Urls;

use yii\base\Component;

/**
 * Class Exporters
 * @package Brezgalov\QueueApiClient\Urls
 *
 * @property-read string $list
 */
class Exporters extends Component
{
    /**
     * @return string
     */
    public function getList()
    {
        return 'exporters/index';
    }
}