<?php

namespace Brezgalov\BaseApiClient\ResponseAdapters;

use Brezgalov\BaseApiClient\ResponseAdapters\Dto\TimeslotDto;
use Brezgalov\QueueApiClient\ResponseAdapters\ITimeslotDto;

class TimeslotRequest extends BaseResponseAdapter implements ITimeslotRequestDto
{
    /**
     * @var ITimeslotDto
     */
    protected $timeslot;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->responseData['id'] ?? null;
    }

    /**
     * @return int
     */
    public function getTimeslotId()
    {
        return $this->responseData['timeslot_id'] ?? null;
    }

    /**
     * @return int
     */
    public function getGroupId()
    {
        return $this->responseData['group_id'] ?? null;
    }

    /**
     * @return int
     */
    public function getUserCreatedId()
    {
        return $this->responseData['user_created_id'] ?? null;
    }

    /**
     * @return int
     */
    public function getTime()
    {
        return $this->responseData['time'] ?? null;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->responseData['type'] ?? null;
    }

    /**
     * @return string
     */
    public function getStateSystem()
    {
        return $this->responseData['state_system'] ?? null;
    }

    /**
     * @return string
     */
    public function getStateUser()
    {
        return $this->responseData['state_user'] ?? null;
    }

    /**
     * @return string
     */
    public function getTruckTypeCode()
    {
        return $this->responseData['truck_type_code'] ?? null;
    }

    /**
     * @return int
     */
    public function getStevedoreId()
    {
        return $this->responseData['stevedore_id'] ?? null;
    }

    /**
     * @return int
     */
    public function getUnloadId()
    {
        return $this->responseData['unload_id'] ?? null;
    }

    /**
     * @return int
     */
    public function getCultureId()
    {
        return $this->responseData['culture_id'] ?? null;
    }

    /**
     * @return int
     */
    public function getExporterId()
    {
        return $this->responseData['exporter_id'] ?? null;
    }

    /**
     * @return int
     */
    public function getSupplierId()
    {
        return $this->responseData['supplier_id'] ?? null;
    }

    /**
     * @return int
     */
    public function getExpireAt()
    {
        return $this->responseData['expire_at'] ?? null;
    }

    /**
     * @return int
     */
    public function getCreatedAt()
    {
        return $this->responseData['created_at'] ?? null;
    }

    /**
     * @return ITimeslotDto|null
     */
    public function getTimeslot()
    {
        if ($this->timeslot) {
            return $this->timeslot;
        }

        $timeslotData = $this->responseData['timeslot'] ?? null;
        if (empty($timeslotData)) {
            return null;
        }

        $this->timeslot = new TimeslotDto($timeslotData);

        return $this->timeslot;
    }
}

/**
 *
 * {
"id": 64601,
"timeslot_id": null,
"group_id": null,
"user_created_id": 15,
"time": 1661519014,
"type": "time_request",
"state_system": "no_quota",
"state_user": "default",
"plate_truck": null,
"truck_type_code": "boardSider",
"stevedore_id": 1,
"unload_id": 1,
"culture_id": 1,
"exporter_id": null,
"supplier_id": null,
"expire_at": 1661767443,
"created_at": 1661508243,
"timeslot": null
}
 *
 *
 *
 * {
"id": 64602,
"timeslot_id": 43642,
"group_id": null,
"user_created_id": 15,
"time": 1661519014,
"type": "time_request",
"state_system": "time_given",
"state_user": "default",
"plate_truck": null,
"truck_type_code": "boardSider",
"stevedore_id": 1,
"unload_id": 1,
"culture_id": 1,
"exporter_id": null,
"supplier_id": null,
"expire_at": false,
"created_at": 1661508334,
    "timeslot": {
        "id": 43642,
        "time": 1661518800,
        "num_auto": null,
        "plate_truck": null,
        "plate_trailer": null,
        "window_from": "2022-08-26 16:00:00",
        "window_to": "2022-08-26 17:00:00",
        "date_cre": "2022-08-26 13:05:34",
        "phone": null,
        "name": null,
        "driver_phone": null,
        "driver_name": null,
        "user_created_phone": "79183984745",
        "truck_status": "not_stated",
        "submit_status": "not_stated",
        "truck_type_code": "boardSider",
        "culture_id_old": null,
        "culture_name_old": null,
        "culture_id": 1,
        "culture_name": "Культура 1",
        "culture_harvest_year": null,
        "exporter_id": null,
        "exporter_name": null,
        "supplier_id": null,
        "supplier_name": null,
        "unload_id": 1,
        "unload_name": "Unload s1 tr1",
        "parking_time": null,
        "buffer_time": null,
        "terminal_time": null,
        "deleted_at": null,
        "extras": {
            "step": null
        }
}
}
 */