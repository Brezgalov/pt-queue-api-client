<?php

namespace Brezgalov\QueueApiClient\ResponseAdapters\Dto;

use Brezgalov\QueueApiClient\ResponseAdapters\ITimeslotDto;
use yii\base\Component;

/**
 * Class TimeslotDto
 * @package Brezgalov\QueueApiClient\ResponseAdapters\Dto
 *
 * @property int $timeFrom
 * @property int $timeTo
 */
class TimeslotDto extends Component implements ITimeslotDto
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $_timeFrom;

    /**
     * @var int
     */
    protected $_timeTo;

    /**
     * @var string
     */
    protected $plateTruck;

    /**
     * @var string
     */
    protected $plateTrailer;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $userCreatedPhone;

    /**
     * @var string
     */
    protected $submitStatus;

    /**
     * @var string
     */
    protected $truckStatus;

    /**
     * @var string
     */
    protected $truckTypeCode;

    /**
     * @var string
     */
    protected $truckTypeName;

    /**
     * @var int
     */
    protected $cultureId;

    /**
     * @var string
     */
    protected $cultureName;

    /**
     * @var string
     */
    protected $cultureHarvestYear;

    /**
     * @var int
     */
    protected $cultureIdOld;

    /**
     * @var string
     */
    protected $cultureNameOld;

    /**
     * @var int
     */
    protected $exporterId;

    /**
     * @var string
     */
    protected $exporterName;

    /**
     * @var string
     */
    protected $supplierId;

    /**
     * @var int
     */
    protected $supplierName;

    /**
     * @var int
     */
    protected $unloadId;

    /**
     * @var string
     */
    protected $unloadName;

    /**
     * @var string
     */
    protected $parkingTime;

    /**
     * @var string
     */
    protected $bufferTime;

    /**
     * @var string
     */
    protected $terminalTime;

    /**
     * @var string
     */
    protected $deletedAt;

    /**
     * @var array
     */
    protected $extras = [];

    /**
     * @return string[]
     */
    private function fieldMatches()
    {
        return [
            'id' => 'id',
            'timeFrom' => 'window_from',
            'timeTo' => 'window_to',
            'plateTruck' => 'plate_truck',
            'plateTrailer' => 'plate_trailer',
            'phone' => 'phone',
            'name' => 'name',
            'userCreatedPhone' => 'user_created_phone',
            'truckStatus' => 'truck_status',
            'submitStatus' => 'submit_status',
            'truckTypeCode' => 'truck_type_code',
            'truckTypeName' => 'truck_type_name',
            'cultureId' => 'culture_id',
            'cultureName' => 'culture_name',
            'cultureHarvestYear' => 'culture_harvest_year',
            'cultureIdOld' => 'culture_id_old',
            'cultureNameOld' => 'culture_name_old',
            'exporterId' => 'exporter_id',
            'exporterName' => 'exporter_name',
            'supplierId' => 'supplier_id',
            'supplierName' => 'supplier_name',
            'unloadId' => 'unload_id',
            'unloadName' => 'unload_name',
            'parkingTime' => 'parking_time',
            'bufferTime' => 'buffer_time',
            'terminalTime' => 'terminal_time',
            'deletedAt' => 'deleted_at',
        ];
    }

    /**
     * TimeslotDto constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct([]);

        foreach ($this->fieldMatches() as $fieldLocal => $fieldApi) {
            $this->{$fieldLocal} = $config[$fieldApi] ?? null;
        }

        $this->extras = $config['extras'] ?? [];
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getTimeFrom()
    {
        return $this->_timeFrom;
    }

    /**
     * @param $value
     */
    public function setTimeFrom($value)
    {
        $this->_timeFrom = is_integer($value) ? $value : strtotime($value);
    }

    /**
     * @return int
     */
    public function getTimeTo()
    {
        return $this->_timeTo;
    }

    /**
     * @param $value
     */
    public function setTimeTo($value)
    {
        $this->_timeTo = is_integer($value) ? $value : strtotime($value);
    }

    /**
     * @return string
     */
    public function getPlateTruck()
    {
        return $this->plateTruck;
    }

    /**
     * @return string
     */
    public function getPlateTrailer()
    {
        return $this->plateTrailer;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUserCreatedPhone()
    {
        return $this->userCreatedPhone;
    }

    /**
     * @return string
     */
    public function getTruckStatus()
    {
        return $this->truckStatus;
    }

    /**
     * @return string
     */
    public function getSubmitStatus()
    {
        return $this->submitStatus;
    }

    /**
     * @return string
     */
    public function getTruckTypeCode()
    {
        return $this->truckTypeCode;
    }

    /**
     * @return string
     */
    public function getTruckTypeName()
    {
        return $this->truckTypeName;
    }

    /**
     * @return int
     */
    public function getCultureId()
    {
        return $this->cultureId;
    }

    /**
     * @return string
     */
    public function getCultureName()
    {
        return $this->cultureName;
    }

    /**
     * @return string
     */
    public function getCultureHarvestYear()
    {
        return $this->cultureHarvestYear;
    }

    /**
     * @return int
     */
    public function getCultureIdOld()
    {
        return $this->cultureIdOld;
    }

    /**
     * @return string
     */
    public function getCultureNameOld()
    {
        return $this->cultureNameOld;
    }

    /**
     * @return int
     */
    public function getExporterId()
    {
        return $this->exporterId;
    }

    /**
     * @return string
     */
    public function getExporterName()
    {
        return $this->exporterName;
    }

    /**
     * @return int
     */
    public function getSupplierId()
    {
        return $this->supplierId;
    }

    /**
     * @return string
     */
    public function getSupplierName()
    {
        return $this->supplierName;
    }

    /**
     * @return int
     */
    public function getUnloadId()
    {
        return $this->unloadId;
    }

    /**
     * @return string
     */
    public function getUnloadName()
    {
        return $this->unloadName;
    }

    /**
     * @return int
     */
    public function getParkingTime()
    {
        return $this->parkingTime ? strtotime($this->parkingTime) : null;
    }

    /**
     * @return int
     */
    public function getBufferTime()
    {
        return $this->bufferTime ? strtotime($this->bufferTime) : null;
    }

    /**
     * @return int
     */
    public function getTerminalTime()
    {
        return $this->terminalTime ? strtotime($this->terminalTime) : null;
    }

    /**
     * @return int
     */
    public function getDeletedAt()
    {
        return $this->deletedAt ? strtotime($this->deletedAt) : null;
    }

    /**
     * @return array
     */
    public function getExtras()
    {
        return $this->extras;
    }

    /**
     * @return integer
     */
    public function getStepTruckSpindlesCount()
    {
        return $this->extras['step']['truck_spindles_count'] ?? null;
    }

    /**
     * @return integer
     */
    public function getStepTrailerSpindlesCount()
    {
        return $this->extras['step']['trailer_spindles_count'] ?? null;
    }

    /**
     * @return integer
     */
    public function getStepGrainOwnerId()
    {
        return $this->extras['step']['step_grain_owner_id'] ?? null;
    }

    /**
     * @return integer
     */
    public function getStepSupplierId()
    {
        return $this->extras['step']['step_supplier_id'] ?? null;
    }

    /**
     * @return string
     */
    public function getStepGrainOwnerName()
    {
        return $this->extras['step']['step_grain_owner_name'] ?? null;
    }

    /**
     * @return string
     */
    public function getStepSupplierName()
    {
        return $this->extras['step']['step_supplier_name'] ?? null;
    }

    /**
     * @return string
     */
    public function getStepSupplierInn()
    {
        return $this->extras['step']['step_supplier_inn'] ?? null;
    }
}