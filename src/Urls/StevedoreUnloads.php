<?php

namespace Brezgalov\QueueApiClient\Urls;

use yii\base\Component;

/**
 * Class StevedoreUnloads
 * @package Brezgalov\QueueApiClient\Urls
 *
 * @property-read string $citiesList
 */
class StevedoreUnloads extends Component
{
    /**
     * @return string
     */
    public function getCitiesList()
    {
        return 'stevedore-unloads/cities';
    }
}