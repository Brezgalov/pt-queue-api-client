<?php

namespace Brezgalov\QueueApiClient\ResponseAdapters\Dto;

use Brezgalov\QueueApiClient\ResponseAdapters\ITimeslotDto;
use Brezgalov\QueueApiClient\ResponseAdapters\ITimeslotRequestDto;
use yii\base\Component;

class TimeslotRequestDto extends Component implements ITimeslotRequestDto
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $timeslotId;

    /**
     * @var int
     */
    protected $groupId;

    /**
     * @var int
     */
    protected $userCreatedId;

    /**
     * @var int
     */
    protected $time;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $stateSystem;

    /**
     * @var string
     */
    protected $stateUser;

    /**
     * @var string
     */
    protected $truckTypeCode;

    /**
     * @var int
     */
    protected $stevedoreId;

    /**
     * @var int
     */
    protected $unloadId;

    /**
     * @var int
     */
    protected $cultureId;

    /**
     * @var int
     */
    protected $exporterId;

    /**
     * @var int
     */
    protected $supplierId;

    /**
     * @var string
     */
    protected $expireAt;

    /**
     * @var string
     */
    protected $createdAt;

    /**
     * @var ITimeslotDto
     */
    protected $timeslot;

    /**
     * @return string[]
     */
    private function fieldMatches()
    {
        return [
            'id' => 'id',
            'timeslotId' => 'timeslot_id',
            'groupId' => 'group_id',
            'userCreatedId' => 'user_created_id',
            'time' => 'time',
            'type' => 'type',
            'stateSystem' => 'state_system',
            'stateUser' => 'state_user',
            'truckTypeCode' => 'truck_type_code',
            'stevedoreId' => 'stevedore_id',
            'unloadId' => 'unload_id',
            'cultureId' => 'culture_id',
            'exporterId' => 'exporter_id',
            'supplierId' => 'supplier_id',
            'expireAt' => 'expire_at',
            'createdAt' => 'created_at',
        ];
    }

    /**
     * TimeslotRequestDto constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {
        parent::__construct([]);

        foreach ($this->fieldMatches() as $fieldLocal => $fieldApi) {
            $this->{$fieldLocal} = $config[$fieldApi] ?? null;
        }

        $timeslotData = $config['timeslot'] ?? null;
        if ($timeslotData) {
            $this->timeslot = new TimeslotDto($timeslotData);
        }
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
    public function getTimeslotId()
    {
        return $this->timeslotId;
    }

    /**
     * @return int
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @return int
     */
    public function getUserCreatedId()
    {
        return $this->userCreatedId;
    }

    /**
     * @return int
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getStateSystem()
    {
        return $this->stateSystem;
    }

    /**
     * @return string
     */
    public function getStateUser()
    {
        return $this->stateUser;
    }

    /**
     * @return string
     */
    public function getTruckTypeCode()
    {
        return $this->truckTypeCode;
    }

    /**
     * @return int
     */
    public function getStevedoreId()
    {
        return $this->stevedoreId;
    }

    /**
     * @return int
     */
    public function getUnloadId()
    {
        return $this->unloadId;
    }

    /**
     * @return int
     */
    public function getCultureId()
    {
        return $this->cultureId;
    }

    /**
     * @return int
     */
    public function getExporterId()
    {
        return $this->exporterId;
    }

    /**
     * @return int
     */
    public function getSupplierId()
    {
        return $this->supplierId;
    }

    /**
     * @return int
     */
    public function getExpireAt()
    {
        return is_string($this->expireAt) ? strtotime($this->expireAt) : $this->expireAt;
    }

    /**
     * @return int
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return ITimeslotDto
     */
    public function getTimeslot()
    {
        return $this->timeslot;
    }
}