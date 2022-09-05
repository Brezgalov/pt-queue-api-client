<?php

namespace Brezgalov\QueueApiClient\ResponseAdapters;

use Brezgalov\BaseApiClient\ResponseAdapters\BaseResponseAdapter;

class Timeslot extends BaseResponseAdapter implements ITimeslotDto
{
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
    public function getTime()
    {
        return $this->responseData['time'] ?? null;
    }

    /**
     * @return string
     */
    public function getPlateTruck()
    {
        return $this->responseData['plate_truck'] ?? null;
    }

    /**
     * @return string
     */
    public function getPlateTrailer()
    {
        return $this->responseData['plate_trailer'] ?? null;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->responseData['phone'] ?? null;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->responseData['name'] ?? null;
    }

    /**
     * @return string
     */
    public function getUserCreatedPhone()
    {
        return $this->responseData['user_created_phone'] ?? null;
    }

    /**
     * @return string
     */
    public function getTruckStatus()
    {
        return $this->responseData['truck_status'] ?? null;
    }

    /**
     * @return string
     */
    public function getSubmitStatus()
    {
        return $this->responseData['submit_status'] ?? null;
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
    public function getCultureId()
    {
        return $this->responseData['culture_id'] ?? null;
    }

    /**
     * @return string
     */
    public function getCultureName()
    {
        return $this->responseData['culture_name'] ?? null;
    }

    /**
     * @return string
     */
    public function getCultureHarvestYear()
    {
        return $this->responseData['culture_harvest_year'] ?? null;
    }

    /**
     * @return int
     */
    public function getCultureIdOld()
    {
        return $this->responseData['culture_id_old'] ?? null;
    }

    /**
     * @return string
     */
    public function getCultureNameOld()
    {
        return $this->responseData['culture_name_old'] ?? null;
    }

    /**
     * @return int
     */
    public function getExporterId()
    {
        return $this->responseData['exporter_id'] ?? null;
    }

    /**
     * @return string
     */
    public function getExporterName()
    {
        return $this->responseData['exporter_name'] ?? null;
    }

    /**
     * @return int
     */
    public function getSupplierId()
    {
        return $this->responseData['supplier_id'] ?? null;
    }

    /**
     * @return string
     */
    public function getSupplierName()
    {
        return $this->responseData['supplier_name'] ?? null;
    }

    /**
     * @return int
     */
    public function getUnloadId()
    {
        return $this->responseData['unload_id'] ?? null;
    }

    /**
     * @return string
     */
    public function getUnloadName()
    {
        return $this->responseData['unload_name'] ?? null;
    }

    /**
     * @return int
     */
    public function getParkingTime()
    {
        return $this->getTimeFromArray($this->responseData, 'parking_time');
    }

    /**
     * @return int
     */
    public function getBufferTime()
    {
        return $this->getTimeFromArray($this->responseData, 'buffer_time');
    }

    /**
     * @return int
     */
    public function getTerminalTime()
    {
        return $this->getTimeFromArray($this->responseData, 'terminal_time');
    }

    /**
     * @return int
     */
    public function getDeletedAt()
    {
        return $this->getTimeFromArray($this->responseData, 'deleted_at');
    }

    /**
     * @param array $array
     * @param string $key
     * @return false|int|null
     */
    protected function getTimeFromArray(array $array, string $key)
    {
        $time = $array[$key] ?? null;
        return $time ? strtotime($time) : null;
    }

    /**
     * @return array
     */
    public function getExtras()
    {
        return $this->responseData['extras'] ?? null;
    }

    /**
     * @return integer
     */
    public function getStepTruckSpindlesCount()
    {
        return $this->responseData['extras']['step']['truck_spindles_count'] ?? null;
    }

    /**
     * @return integer
     */
    public function getStepTrailerSpindlesCount()
    {
        return $this->responseData['extras']['step']['trailer_spindles_count'] ?? null;
    }

    /**
     * @return integer
     */
    public function getStepGrainOwnerId()
    {
        return $this->responseData['extras']['step']['step_grain_owner_id'] ?? null;
    }

    /**
     * @return integer
     */
    public function getStepSupplierId()
    {
        return $this->responseData['extras']['step']['step_supplier_id'] ?? null;
    }

    /**
     * @return string
     */
    public function getStepGrainOwnerName()
    {
        return $this->responseData['extras']['step']['step_grain_owner_name'] ?? null;
    }

    /**
     * @return string
     */
    public function getStepSupplierName()
    {
        return $this->responseData['extras']['step']['step_supplier_name'] ?? null;
    }

    /**
     * @return string
     */
    public function getStepSupplierInn()
    {
        return $this->responseData['extras']['step']['step_supplier_inn'] ?? null;
    }
}
