<?php

namespace Brezgalov\QueueApiClient\RequestBodies;

use yii\base\Component;

class TimeslotsSearchRequestParams extends Component implements IRequestParams
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $timeFrom;

    /**
     * @var int
     */
    public $timeTo;

    /**
     * @var string
     */
    public $plateTruck;

    /**
     * @var string
     */
    public $plateTruckLike;

    /**
     * @var string
     */
    public $submitStatus;

    /**
     * @var bool
     */
    public $submitted;

    /**
     * @var string
     */
    public $truckStatus;

    /**
     * @var string
     */
    public $truckTypeCode;

    /**
     * @var bool
     */
    public $late;

    /**
     * @var int
     */
    public $quotaId;

    /**
     * @var int
     */
    public $stevedoreId;

    /**
     * @var int
     */
    public $unloadId;

    /**
     * @var int
     */
    public $cultureId;

    /**
     * @var int
     */
    public $exporterId;

    /**
     * @var int
     */
    public $supplierId;

    /**
     * @var int
     */
    public $unloadCityId;

    /**
     * @var bool
     */
    public $deleted;

    /**
     * @return array
     */
    public function getParams()
    {
        $submitted = null;
        if (!is_null($this->submitted)) {
            $submitted = $this->submitted ? 1 : 0;
        }

        return [
            'id' => $this->id,
            'time_from' => $this->timeFrom,
            'time_to' => $this->timeTo,
            'plate_truck' => $this->plateTruck,
            'plate_truck_like' => $this->plateTruckLike,
            'submitted' => $submitted,
            'submit_status' => $this->submitStatus,
            'truck_status' => $this->truckStatus,
            'truck_type_code' => $this->truckTypeCode,
            'late' => is_null($this->late) ? null : (int)$this->late,
            'quota_id' => $this->quotaId,
            'stevedore_id' => $this->stevedoreId,
            'unload_id' => $this->unloadId,
            'culture_id' => $this->cultureId,
            'exporter_id' => $this->exporterId,
            'supplier_id' => $this->supplierId,
            'unload_city_id' => $this->unloadCityId,
            'deleted' => is_null($this->deleted) ? null : (int)$this->deleted,
        ];
    }
}
