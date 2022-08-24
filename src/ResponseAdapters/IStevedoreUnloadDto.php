<?php

namespace Brezgalov\QueueApiClient\ResponseAdapters;

interface IStevedoreUnloadDto
{
    public function getId();
    public function getCityId();
    public function getSlug();
    public function getName();
    public function getUseIncompleteParking();
    public function getBufferMoveType();
    public function getStevedoreId();
    public function getBufferMovementIsActive();
    public function getTrucksPerHourDefault();
    public function getTimeslotDurationSec();
    public function getBufferZoneSize();
    public function getUseTimeslotsWallet();
    public function getManualTsLimiting();
}

