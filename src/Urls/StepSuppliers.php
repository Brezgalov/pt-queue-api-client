<?php

namespace Brezgalov\QueueApiClient\Urls;

use yii\base\Component;

/**
 * Class StepSuppliers
 * @package Brezgalov\QueueApiClient\Urls
 *
 * @property-read string $checkInn
 */
class StepSuppliers extends Component
{
    /**
     * @return string
     */
    public function getCheckInn()
    {
        return "step-suppliers/check-inn";
    }
}