<?php

namespace Brezgalov\QueueApiClient\RequestBodies;

use yii\base\Component;

class AutofillsCreateRequestBody extends Component implements IRequestBody
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
     * AutofillsCreateRequestBody constructor.
     * @param int $unloadId
     * @param string $name
     * @param string $plateTruck
     * @param string $phone
     * @param string|null $truckTypeCode
     * @param string|null $plateTrailer
     */
    public function __construct(int $unloadId, string $name, string $plateTruck, string $phone, string $truckTypeCode = null, string $plateTrailer = null)
    {
        $this->unloadId = $unloadId;
        $this->name = $name;
        $this->plateTruck = $plateTruck;
        $this->phone = $phone;

        $this->truckTypeCode = $truckTypeCode;
        $this->plateTrailer = $plateTrailer;

        parent::__construct([]);
    }

    /**
     * @return array
     */
    public function getBody()
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