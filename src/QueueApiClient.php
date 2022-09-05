<?php

namespace Brezgalov\QueueApiClient;

use Brezgalov\BaseApiClient\BaseApiClient;
use Brezgalov\QueueApiClient\RequestBodies\AutofillsCreateRequestBody;
use Brezgalov\QueueApiClient\RequestBodies\AutofillsListRequestParams;
use Brezgalov\QueueApiClient\RequestBodies\CreateTimeRequestBody;
use Brezgalov\QueueApiClient\RequestBodies\SubmitTimeslotRequestBody;
use Brezgalov\QueueApiClient\ResponseAdapters\StevedoreUnload;
use Brezgalov\QueueApiClient\ResponseAdapters\Timeslot;
use Brezgalov\QueueApiClient\ResponseAdapters\TimeslotRequestsCollection;
use yii\base\InvalidConfigException;
use yii\httpclient\Exception;
use yii\httpclient\Message;
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
     * @throws InvalidConfigException
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
     * @throws Exception
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
     * @return Message|Request
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
     * @return Message|Request
     * @throws InvalidConfigException
     */
    public function getCulturesListRequest(int $unloadId = null)
    {
        return $this->prepareRequest($this->urls->cultures->list, [
            'unload_id' => $unloadId,
        ]);
    }

    /**
     * @return Message|Request
     * @throws InvalidConfigException
     */
    public function getTruckTypesListRequest()
    {
        return $this->prepareRequest($this->urls->truckTypes->list);
    }

    /**
     * @return Message|Request
     * @throws InvalidConfigException
     */
    public function getExportersListRequest()
    {
        return $this->prepareRequest($this->urls->exporters->list);
    }

    /**
     * @return Message|Request
     * @throws InvalidConfigException
     */
    public function getStepGrainOwnersListRequest()
    {
        return $this->prepareRequest($this->urls->stepGrainOwners->list);
    }

    /**
     * @param CreateTimeRequestBody $requestBody
     * @return TimeslotRequestsCollection
     * @throws InvalidConfigException
     * @throws Exception
     */
    public function createTimeRequest(CreateTimeRequestBody $requestBody)
    {
        $request = $this->prepareRequest($this->urls->timeslotRequests->createTimeRequest)
            ->setMethod('POST')
            ->setData($requestBody->getBody());

        return new TimeslotRequestsCollection($request, $request->send());
    }

    /**
     * @param AutofillsListRequestParams|null $params
     * @return Message|Request
     * @throws InvalidConfigException
     */
    public function getAutofillsListRequest(AutofillsListRequestParams $params = null)
    {
        return $this->prepareRequest($this->urls->timeslotRequestAutofills->list, $params ? $params->getParams() : []);
    }

    /**
     * @param AutofillsCreateRequestBody $body
     * @return Message|Request
     * @throws InvalidConfigException
     */
    public function getCreateAutofillRequest(AutofillsCreateRequestBody $body)
    {
        return $this->prepareRequest($this->urls->timeslotRequestAutofills->create)
            ->setMethod('POST')
            ->setData($body->getBody());
    }

    /**
     * @param SubmitTimeslotRequestBody $body
     * @return Timeslot
     * @throws InvalidConfigException
     * @throws Exception
     */
    public function submitTimeslot(SubmitTimeslotRequestBody $body)
    {
        $request = $this->prepareRequest($this->urls->timeslots->submitTimeslot)
            ->setMethod('POST')
            ->setData($body->getBody());

        return new Timeslot($request, $request->send());
    }

    /**
     * @param int $timeslotId
     * @return Timeslot
     * @throws Exception
     * @throws InvalidConfigException
     */
    public function denyTimeslot(int $timeslotId)
    {
        $request = $this->prepareRequest($this->urls->timeslots->submitTimeslot)
            ->setMethod('POST')
            ->setData([
                'timeslot_id' => $timeslotId,
                'submit' => 0,
            ]);

        return new Timeslot($request, $request->send());
    }

    /**
     * @param int $timeslotId
     * @return Message|Request
     * @throws InvalidConfigException
     */
    public function getDropTimeslotRequest(int $timeslotId)
    {
        return $this->prepareRequest($this->urls->timeslots->dropTimeslot, [
            'timeslot_id' => $timeslotId,
        ])->setMethod('DELETE');
    }

    /**
     * @param string $inn
     * @return Message|Request
     * @throws InvalidConfigException
     */
    public function getStepSuppliersCheckInnRequest(string $inn)
    {
        return $this->prepareRequest($this->urls->stepSuppliers->checkInn, [
            'inn' => $inn,
        ]);
    }

    /**
     * @param string $route
     * @param array $queryParams
     * @param bool $useAppEnv
     * @param Request|null $request
     * @return Message|Request
     * @throws InvalidConfigException
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