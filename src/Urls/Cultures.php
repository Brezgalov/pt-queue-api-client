<?php

namespace Brezgalov\QueueApiClient\Urls;

use yii\base\Component;

/**
 * Class Cultures
 * @package Brezgalov\QueueApiClient\Urls
 *
 * @property-read string $list
 */
class Cultures extends Component
{
    /**
     * @return string
     */
    public function getList()
    {
        return 'cultures/index';
    }
}