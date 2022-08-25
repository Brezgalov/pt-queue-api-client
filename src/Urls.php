<?php

namespace Brezgalov\QueueApiClient;

use Brezgalov\QueueApiClient\Urls\Cultures;
use Brezgalov\QueueApiClient\Urls\Exporters;
use Brezgalov\QueueApiClient\Urls\StevedoreUnloads;
use Brezgalov\QueueApiClient\Urls\TruckTypes;
use yii\base\Component;

/**
 * Class Urls
 * @package Brezgalov\AuthServiceClient
 */
class Urls extends Component
{
    /**
     * @var StevedoreUnloads
     */
    public $stevedoreUnloads;

    /**
     * @var Cultures
     */
    public $cultures;

    /**
     * @var TruckTypes
     */
    public $truckTypes;

    /**
     * @var Exporters
     */
    public $exporters;

    /**
     * Urls constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {
        parent::__construct($config);

        if (empty($this->stevedoreUnloads)) {
            $this->stevedoreUnloads = \Yii::createObject(StevedoreUnloads::class);
        }

        if (empty($this->cultures)) {
            $this->cultures = \Yii::createObject(Cultures::class);
        }

        if (empty($this->truckTypes)) {
            $this->truckTypes = \Yii::createObject(TruckTypes::class);
        }

        if (empty($this->exporters)) {
            $this->exporters = \Yii::createObject(Exporters::class);
        }
    }
}