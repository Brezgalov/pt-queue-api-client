<?php

namespace Brezgalov\QueueApiClient\ResponseAdapters;

interface ITimeslotDto
{
    const SUBMIT_STATUS_CONVERTED_TO_MANUAL = 'convertedToManual';
    const SUBMIT_STATUS_NOT_STATED          = 'not_stated';
    const SUBMIT_STATUS_MANUAL              = 'manual';
    const SUBMIT_STATUS_SUBMITTED           = 'submitted';
    const SUBMIT_STATUS_DENIED              = 'denied';
    const SUBMIT_STATUS_DROPPED             = 'dropped';
    const SUBMIT_STATUS_EXPIRED             = 'expired';
    const SUBMIT_STATUS_QUOTA_CLOSED        = 'closed';
    const SUBMIT_STATUS_DROP_ON_NEW         = 'dropOnNew';
    const SUBMIT_STATUS_DELETED_BY_ADMIN    = 'deletedByAdmin';
    const SUBMIT_STATUS_MOVE_NOT_SUBMITTED  = 'moveNotSubmitted';
    const SUBMIT_STATUS_MOVED               = 'moved';

    const TRUCK_STATUS_NOT_STATED   = 'not_stated';
    const TRUCK_STATUS_PARKED_FAR   = 'parked_far';
    const TRUCK_STATUS_PARKED_CLOSE = 'parked_close';
    const TRUCK_STATUS_ARRIVED      = 'arrived';
    const TRUCK_STATUS_LATE         = 'late';
    const TRUCK_STATUS_DETACHED     = 'detached';

    const STATUSES_NOT_SUBMITTED = [
        self::SUBMIT_STATUS_NOT_STATED,
        self::SUBMIT_STATUS_MOVE_NOT_SUBMITTED,
    ];

    const STATUSES_FILLING_QUOTA = [
        self::SUBMIT_STATUS_SUBMITTED,
        self::SUBMIT_STATUS_NOT_STATED,
        self::SUBMIT_STATUS_MOVE_NOT_SUBMITTED,
    ];

    const STATUSES_AFTER_BUFFER = [
        self::TRUCK_STATUS_PARKED_CLOSE,
        self::TRUCK_STATUS_ARRIVED,
    ];

    const STATUSES_BEFORE_BUFFER = [
        self::TRUCK_STATUS_NOT_STATED,
        self::TRUCK_STATUS_PARKED_FAR,
        self::TRUCK_STATUS_LATE,
        self::TRUCK_STATUS_DETACHED,
    ];

    /**
     * @return int
     */
    public function getId();

    /**
     * @return int
     */
    public function getTime();

    /**
     * @return string
     */
    public function getPlateTruck();

    /**
     * @return string
     */
    public function getPlateTrailer();

    /**
     * @return string
     */
    public function getPhone();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getUserCreatedPhone();

    /**
     * @return string
     */
    public function getTruckStatus();

    /**
     * @return string
     */
    public function getSubmitStatus();

    /**
     * @return string
     */
    public function getTruckTypeCode();

    /**
     * @return int
     */
    public function getCultureId();

    /**
     * @return string
     */
    public function getCultureName();

    /**
     * @return string
     */
    public function getCultureHarvestYear();

    /**
     * @return int
     */
    public function getCultureIdOld();

    /**
     * @return string
     */
    public function getCultureNameOld();

    /**
     * @return int
     */
    public function getExporterId();

    /**
     * @return string
     */
    public function getExporterName();

    /**
     * @return int
     */
    public function getSupplierId();

    /**
     * @return string
     */
    public function getSupplierName();

    /**
     * @return int
     */
    public function getUnloadId();

    /**
     * @return int
     */
    public function getUnloadName();

    /**
     * @return int
     */
    public function getParkingTime();

    /**
     * @return int
     */
    public function getBufferTime();

    /**
     * @return int
     */
    public function getTerminalTime();

    /**
     * @return int
     */
    public function getDeletedAt();

    /**
     * @return array
     */
    public function getExtras();
}