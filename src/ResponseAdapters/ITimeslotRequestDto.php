<?php

namespace Brezgalov\QueueApiClient\ResponseAdapters;

use Brezgalov\QueueApiClient\ResponseAdapters\ITimeslotDto;

interface ITimeslotRequestDto
{
    const TYPE_TIME_REQUEST             = 'time_request';
    const TYPE_MOVE_REQUEST             = 'move_request';

    const STATE_SYSTEM_DEFAULT          = 'default';
    const STATE_SYSTEM_NO_QUOTA         = 'no_quota';
    const STATE_SYSTEM_TIME_GIVEN       = 'time_given';
    const STATE_SYSTEM_TIME_SUBMITTED   = 'time_submitted';
    const STATE_SYSTEM_EXPIRED          = 'expired';
    const STATE_SYSTEM_DROP_ON_NEW      = 'drop_on_new';

    const STATE_USER_DEFAULT            = 'default';
    const STATE_USER_DENIED             = 'denied';

    /**
     * @return int
     */
    public function getId();

    /**
     * @return int
     */
    public function getTimeslotId();

    /**
     * @return int
     */
    public function getGroupId();

    /**
     * @return int
     */
    public function getUserCreatedId();

    /**
     * @return int
     */
    public function getTime();

    /**
     * @return string
     */
    public function getType();

    /**
     * @return string
     */
    public function getStateSystem();

    /**
     * @return string
     */
    public function getStateUser();

    /**
     * @return string
     */
    public function getTruckTypeCode();

    /**
     * @return int
     */
    public function getStevedoreId();

    /**
     * @return int
     */
    public function getUnloadId();

    /**
     * @return int
     */
    public function getCultureId();

    /**
     * @return int
     */
    public function getExporterId();

    /**
     * @return int
     */
    public function getSupplierId();

    /**
     * @return int
     */
    public function getExpireAt();

    /**
     * @return int
     */
    public function getCreatedAt();

    /**
     * @return ITimeslotDto
     */
    public function getTimeslot();
}