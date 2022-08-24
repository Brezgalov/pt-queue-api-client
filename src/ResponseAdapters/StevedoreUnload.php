<?php

namespace Brezgalov\QueueApiClient\ResponseAdapters;

use Brezgalov\BaseApiClient\ResponseAdapters\BaseResponseAdapter;

class StevedoreUnload extends BaseResponseAdapter implements IStevedoreUnloadDto
{
    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->responseData['id'] ?? null;
    }

    /**
     * @return int|null
     */
    public function getCityId()
    {
        return $this->responseData['city_id'] ?? null;
    }
    
    /**
     * @return string|null
     */
    public function getSlug()
    {
        return $this->responseData['slug'] ?? null;
    }
    
    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->responseData['name'] ?? null;
    }
    
    /**
     * @return int|null
     */
    public function getUseIncompleteParking()
    {
        return $this->responseData['use_incomplete_parking'] ?? null;
    }
    
    /**
     * @return string|null
     */
    public function getBufferMoveType()
    {
        return $this->responseData['buffer_move_type'] ?? null;
    }
    
    /**
     * @return int|null
     */
    public function getStevedoreId()
    {
        return $this->responseData['stevedore_id'] ?? null;
    }
    
    /**
     * @return int|null
     */
    public function getBufferMovementIsActive()
    {
        return $this->responseData['buffer_movement_is_active'] ?? null;
    }
    
    /**
     * @return int|null
     */
    public function getTrucksPerHourDefault()
    {
        return $this->responseData['trucks_per_hour_default'] ?? null;
    }
    
    /**
     * @return int|null
     */
    public function getTimeslotDurationSec()
    {
        return $this->responseData['timeslot_duration_sec'] ?? null;
    }
    
    /**
     * @return int|null
     */
    public function getBufferZoneSize()
    {
        return $this->responseData['buffer_zone_size'] ?? null;
    }
    
    /**
     * @return int|null
     */
    public function getUseTimeslotsWallet()
    {
        return $this->responseData['use_timeslots_wallet'] ?? null;
    }

    /**
     * @return int|null
     */
    public function getManualTsLimiting()
    {
        return $this->responseData['manual_ts_limiting'] ?? null;
    }
}