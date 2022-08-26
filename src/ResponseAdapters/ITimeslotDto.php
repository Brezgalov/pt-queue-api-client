<?php

namespace Brezgalov\QueueApiClient\ResponseAdapters;

interface ITimeslotDto
{
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