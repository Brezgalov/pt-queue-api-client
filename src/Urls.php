<?php

namespace Brezgalov\QueueApiClient;

use Brezgalov\QueueApiClient\Urls\Cultures;
use Brezgalov\QueueApiClient\Urls\Exporters;
use Brezgalov\QueueApiClient\Urls\Pages;
use Brezgalov\QueueApiClient\Urls\StepGrainOwners;
use Brezgalov\QueueApiClient\Urls\StepSuppliers;
use Brezgalov\QueueApiClient\Urls\StevedoreUnloads;
use Brezgalov\QueueApiClient\Urls\TimeslotRequestAutofills;
use Brezgalov\QueueApiClient\Urls\TimeslotRequests;
use Brezgalov\QueueApiClient\Urls\Timeslots;
use Brezgalov\QueueApiClient\Urls\TruckTypes;
use yii\base\Component;
use yii\base\InvalidConfigException;

/**
 * Class Urls
 * @package Brezgalov\AuthServiceClient
 * 
 * @property-read StevedoreUnloads $stevedoreUnloads
 * @property-read Cultures $cultures
 * @property-read TruckTypes $truckTypes
 * @property-read Exporters $exporters
 * @property-read StepGrainOwners $stepGrainOwners
 * @property-read StepSuppliers $stepSuppliers
 * @property-read TimeslotRequests $timeslotRequests
 * @property-read TimeslotRequestAutofills $timeslotRequestAutofills
 * @property-read Timeslots $timeslots
 * @property-read Pages $pages
 */
class Urls extends Component
{
    /**
     * @return StevedoreUnloads
     * @throws InvalidConfigException
     */
    public function getStevedoreUnloads()
    {
        return \Yii::createObject(StevedoreUnloads::class);
    }

    /**
     * @return Cultures
     * @throws InvalidConfigException
     */
    public function getCultures()
    {
        return \Yii::createObject(Cultures::class);
    }

    /**
     * @return TruckTypes
     * @throws InvalidConfigException
     */
    public function getTruckTypes()
    {
        return \Yii::createObject(TruckTypes::class);
    }

    /**
     * @return Exporters
     * @throws InvalidConfigException
     */
    public function getExporters()
    {
        return \Yii::createObject(Exporters::class);
    }

    /**
     * @return StepGrainOwners
     * @throws InvalidConfigException
     */
    public function getStepGrainOwners()
    {
        return \Yii::createObject(StepGrainOwners::class);
    }

    /**
     * @return StepSuppliers
     * @throws InvalidConfigException
     */
    public function getStepSuppliers()
    {
        return \Yii::createObject(StepSuppliers::class);
    }

    /**
     * @return TimeslotRequests
     * @throws InvalidConfigException
     */
    public function getTimeslotRequests()
    {
        return \Yii::createObject(TimeslotRequests::class);
    }

    /**
     * @return TimeslotRequestAutofills
     * @throws InvalidConfigException
     */
    public function getTimeslotRequestAutofills()
    {
        return \Yii::createObject(TimeslotRequestAutofills::class);
    }

    /**
     * @return Timeslots
     * @throws InvalidConfigException
     */
    public function getTimeslots()
    {
        return \Yii::createObject(Timeslots::class);
    }

    /**
     * @return Pages
     * @throws InvalidConfigException
     */
    public function getPages()
    {
        return \Yii::createObject(Pages::class);
    }
}