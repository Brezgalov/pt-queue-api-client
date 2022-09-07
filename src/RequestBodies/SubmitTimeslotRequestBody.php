<?php

namespace Brezgalov\QueueApiClient\RequestBodies;

class SubmitTimeslotRequestBody implements IRequestBody
{
    /**
     * @var int
     */
    public $timeslotId;

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
    public $name;

    /**
     * @var string
     */
    public $truckTypeCode;

    /**
     * @var int
     */
    public $truckSpindlesCount;

    /**
     * @var int
     */
    public $trailerSpindlesCount;

    /**
     * @var int
     */
    public $stepSupplierId;

    /**
     * SubmitTimeslotRequestBody constructor.
     * @param int $timeslotId
     * @param string $plateTruck
     * @param string $plateTrailer
     * @param string $phone
     * @param string $name
     * @param string|null $truckTypeCode
     * @param int|null $truckSpindlesCount
     * @param int|null $trailerSpindlesCount
     * @param int|null $stepSupplierId
     */
    public function __construct(
        int $timeslotId,
        string $plateTruck,
        string $phone,
        string $name,
        string $plateTrailer = null,
        string $truckTypeCode = null,
        int $truckSpindlesCount = null,
        int $trailerSpindlesCount = null,
        int $stepSupplierId = null
    ) {
        $this->timeslotId = $timeslotId;
        $this->plateTruck = $plateTruck;
        $this->plateTrailer = $plateTrailer;
        $this->phone = $phone;
        $this->name = $name;
        $this->truckTypeCode = $truckTypeCode;
        $this->trailerSpindlesCount = $truckSpindlesCount;
        $this->trailerSpindlesCount = $trailerSpindlesCount;
        $this->stepSupplierId = $stepSupplierId;
    }

    /**
     * @return array
     */
    public function getBody()
    {
        return [
            "timeslot_id" => $this->timeslotId,
            "submit" => 1,
            "plate_truck" => $this->plateTruck,
            "plate_trailer" => $this->plateTrailer,
            "phone" => $this->phone,
            "name" => $this->name,
            "truck_type_code" => $this->truckTypeCode,
            "truck_spindles_count" => $this->truckSpindlesCount,
            "trailer_spindles_count" => $this->trailerSpindlesCount,
            "step_supplier_id" => $this->stepSupplierId,
        ];
    }
}