<?php

namespace Brezgalov\QueueApiClient;

use Brezgalov\QueueApiClient\Urls\StevedoreUnloads;
use yii\base\Component;

/**
 * Class Urls
 * @package Brezgalov\AuthServiceClient
 */
class Urls extends Component
{
    /**
     * @var StevedoreUnloads
     */
    public $stevedoreUnloads;

    /**
     * Urls constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {
        parent::__construct($config);

        if (empty($this->stevedoreUnloads)) {
            $this->stevedoreUnloads = \Yii::createObject(StevedoreUnloads::class);
        }
    }
}