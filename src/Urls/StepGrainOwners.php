<?php

namespace Brezgalov\QueueApiClient\Urls;

use yii\base\Component;

/**
 * Class GrainOwners
 * @package Brezgalov\QueueApiClient\Urls
 *
 * @property-read string $list
 */
class StepGrainOwners extends Component
{
    /**
     * @return string
     */
    public function getList()
    {
        return 'step-grain-owners/index';
    }
}