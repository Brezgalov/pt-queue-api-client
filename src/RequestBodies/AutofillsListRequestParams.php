<?php

namespace Brezgalov\QueueApiClient\RequestBodies;

use yii\base\Component;

class AutofillsListRequestParams extends Component implements IRequestParams
{
    /**
     * @var int
     */
    public $unloadId;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $plateTruck;

    /**
     * @var string
     */
    public $plateTrailer;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var string
     */
    public $truckTypeCode;

    /**
     * @return array
     */
    public function getParams()
    {
        return [
            'unload_id' => 'unloadId',
            'name',
            'plate_truck' => 'plateTruck',
            'plate_trailer' => 'plateTrailer',
            'phone',
            'truck_type_code' => 'truckTypeCode',
        ];
    }
}