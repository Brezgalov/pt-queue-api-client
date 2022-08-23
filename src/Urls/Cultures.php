<?php

namespace Brezgalov\QueueApiClient\Urls;

use yii\base\Component;

/**
 * Class Cultures
 * @package Brezgalov\QueueApiClient\Urls
 *
 * @property-read string $culturesList
 */
class Cultures extends Component
{
    /**
     * @return string
     */
    public function getCulturesList()
    {
        return 'cultures/index';
    }
}