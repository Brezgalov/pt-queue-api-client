<?php

namespace Brezgalov\QueueApiClient\ResponseAdapters;

interface IStevedoreUnloadDto
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return int
     */
    public function getCityId();

    /**
     * @return string
     */
    public function getSlug();

    /**
     * @return bool
     */
    public function getIsStep();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return int
     */
    public function getUseIncompleteParking();

    /**
     * @return string
     */
    public function getBufferMoveType();

    /**
     * @return int
     */
    public function getStevedoreId();

    /**
     * @return int
     */
    public function getBufferMovementIsActive();

    /**
     * @return int
     */
    public function getTrucksPerHourDefault();

    /**
     * @return int
     */
    public function getTimeslotDurationSec();

    /**
     * @return int
     */
    public function getBufferZoneSize();

    /**
     * @return int
     */
    public function getUseTimeslotsWallet();

    /**
     * @return int
     */
    public function getManualTsLimiting();
}

