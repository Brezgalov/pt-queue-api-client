<?php

namespace Brezgalov\QueueApiClient;

use Brezgalov\QueueApiClient\Urls\Cultures;
use Brezgalov\QueueApiClient\Urls\Exporters;
use Brezgalov\QueueApiClient\Urls\StepGrainOwners;
use Brezgalov\QueueApiClient\Urls\StepSuppliers;
use Brezgalov\QueueApiClient\Urls\StevedoreUnloads;
use Brezgalov\QueueApiClient\Urls\TimeslotRequestAutofills;
use Brezgalov\QueueApiClient\Urls\TimeslotRequests;
use Brezgalov\QueueApiClient\Urls\Timeslots;
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
     * @var StepGrainOwners
     */
    public $stepGrainOwners;

    /**
     * @var StepSuppliers
     */
    public $stepSuppliers;

    /**
     * @var TimeslotRequests
     */
    public $timeslotRequests;

    /**
     * @var TimeslotRequestAutofills
     */
    public $timeslotRequestAutofills;

    /**
     * @var Timeslots
     */
    public $timeslots;

    /**
     * Urls constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {
        parent::__construct($config);

        $defaults = [
            'stevedoreUnloads' => StevedoreUnloads::class,
            'cultures' => Cultures::class,
            'truckTypes' => TruckTypes::class,
            'exporters' => Exporters::class,
            'stepGrainOwners' => StepGrainOwners::class,
            'stepSuppliers' => StepSuppliers::class,
            'timeslotRequests' => TimeslotRequests::class,
            'timeslotRequestAutofills' => TimeslotRequestAutofills::class,
            'timeslots' => Timeslots::class,
        ];

        foreach ($defaults as $field => $setup) {
            if (empty($this->{$field})) {
                $this->{$field} = \Yii::createObject($setup);
            }
        }
    }
}