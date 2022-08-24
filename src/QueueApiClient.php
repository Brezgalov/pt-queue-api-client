<?php

namespace Brezgalov\QueueApiClient;

use Brezgalov\BaseApiClient\BaseApiClient;
use Brezgalov\QueueApiClient\ResponseAdapters\StevedoreUnload;
use yii\base\InvalidConfigException;
use yii\httpclient\Request;

class QueueApiClient extends BaseApiClient
{
    /**
     * @var string
     */
    public $activityId;

    /**
     * @var string
     */
    public $token;

    /**
     * @var Urls
     */
    public $urls;

    /**
     * @var string
     */
    public $authHeader = 'Authorization';

    /**
     * @var string
     */
    public $activityIdParameterName = 'activity_id';

    /**
     * AuthServiceClient constructor.
     * @param array $config
     * @throws \yii\base\InvalidConfigException
     */
    public function __construct($config = [])
    {
        parent::__construct($config);

        if (empty($this->urls)) {
            $this->urls = \Yii::createObject(Urls::class);
        }
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setActivityId(string $value)
    {
        $this->activityId = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setToken(string $value)
    {
        $this->token = $value;

        return $this;
    }

    /**
     * @param int $unloadId
     * @return StevedoreUnload
     * @throws InvalidConfigException
     * @throws \yii\httpclient\Exception
     */
    public function getStevedoreUnload(int $unloadId)
    {
        $request = $this->prepareRequest($this->urls->stevedoreUnloads->single, [
            'id' => $unloadId,
        ]);

        return new StevedoreUnload($request, $request->send());
    }

    /**
     * @param int|null $cityId
     * @return \yii\httpclient\Message|Request
     * @throws InvalidConfigException
     */
    public function getCitiesListRequest(int $cityId = null)
    {
        $queryParams = [];

        if (!is_null($cityId)) {
            $queryParams['city_id'] = $cityId;
        }

        return $this->prepareRequest($this->urls->stevedoreUnloads->citiesList, $queryParams);
    }

    /**
     * @param int|null $unloadId
     * @return \yii\httpclient\Message|Request
     * @throws InvalidConfigException
     */
    public function getCulturesListRequest(int $unloadId = null)
    {
        return $this->prepareRequest($this->urls->cultures->culturesList, [
            'unload_id' => $unloadId,
        ]);
    }

    /**
     * @param string $route
     * @param array $queryParams
     * @param bool $useAppEnv
     * @param Request|null $request
     * @return \yii\httpclient\Message|Request
     * @throws \yii\base\InvalidConfigException
     */
    public function prepareRequest(string $route, array $queryParams = [], Request $request = null)
    {
        if ($this->activityId) {
            $queryParams[$this->activityIdParameterName] = $this->activityId;
        }

        $request = parent::prepareRequest($route, $queryParams, $request);

        if ($this->token) {
            $request->addHeaders([
                $this->authHeader => "Bearer {$this->token}",
            ]);
        }

        return $request;
    }
}