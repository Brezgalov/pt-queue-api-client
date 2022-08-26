<?php

namespace Brezgalov\QueueApiClient\RequestBodies;

use yii\base\Component;

class CreateTimeRequestBody extends Component implements IRequestBody
{
    /**
     * @var int
     */
    public $requestsCount = 1;

    /**
     * @var int
     */
    public $time;

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
     * @var string
     */
    public $truckTypeCode;

    /**
     * @var int
     */
    public $stepGrainOwnerId;

    /**
     * @return array
     */
    public function getBody()
    {
        $body = [
            "requests_count" => $this->requestsCount,
            "time" => $this->time,
            "unload_id" => $this->unloadId,
            "culture_id" => $this->cultureId,
            "exporter_id" => $this->exporterId,
            "supplier_id" => $this->supplierId,
            "truck_type_code" => $this->truckTypeCode,
        ];

        if (!is_null($this->stepGrainOwnerId)) {
            $body["step_grain_owner_id"] = $this->stepGrainOwnerId;
        }

        return $body;
    }
}