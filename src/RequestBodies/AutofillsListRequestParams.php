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
            'unload_id' => intval($this->unloadId),
            'name' => $this->name,
            'plate_truck' => $this->plateTruck,
            'plate_trailer' => $this->plateTrailer,
            'phone' => $this->phone,
            'truck_type_code' => $this->truckTypeCode,
        ];
    }
}