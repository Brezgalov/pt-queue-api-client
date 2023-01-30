<?php

namespace Brezgalov\QueueApiClient;

use Brezgalov\BaseApiClient\BaseApiClient;
use Brezgalov\BaseApiClient\Exception\RequestFailedException;
use Brezgalov\QueueApiClient\RequestBodies\AutofillsCreateRequestBody;
use Brezgalov\QueueApiClient\RequestBodies\AutofillsListRequestParams;
use Brezgalov\QueueApiClient\RequestBodies\CreateTimeRequestBody;
use Brezgalov\QueueApiClient\RequestBodies\StevedoreUnloadsFilter;
use Brezgalov\QueueApiClient\RequestBodies\SubmitTimeslotRequestBody;
use Brezgalov\QueueApiClient\RequestBodies\TimeslotsSearchRequestParams;
use Brezgalov\QueueApiClient\ResponseAdapters\StevedoreUnload;
use Brezgalov\QueueApiClient\ResponseAdapters\Timeslot;
use Brezgalov\QueueApiClient\ResponseAdapters\TimeslotRequestsCollection;
use Brezgalov\QueueApiClient\ResponseAdapters\TimeslotsCollection;
use Throwable;
use yii\base\InvalidConfigException;
use yii\httpclient\Message;
use yii\httpclient\Request;
use yii\httpclient\Response;

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

    private $onPrepareRequestCallbacks = [];
    private $onSendSucceedCallbacks = [];
    private $onSendFailedCallbacks = [];

    public function __construct($config = [])
    {
        parent::__construct($config);

        if (empty($this->urls)) {
            $this->urls = \Yii::createObject(Urls::class);
        }
    }

    public function setActivityId(string $value): QueueApiClient
    {
        $this->activityId = $value;

        return $this;
    }

    public function getActivityId(): ?string
    {
        return $this->activityId;
    }

    public function setToken(string $value): QueueApiClient
    {
        $this->token = $value;

        return $this;
    }

    public function addOnPrepareRequestCallback(callable $callback): QueueApiClient
    {
        $this->onPrepareRequestCallbacks[] = $callback;

        return $this;
    }

    public function addOnSendSucceedCallback(callable $callback): QueueApiClient
    {
        $this->onSendSucceedCallbacks[] = $callback;

        return $this;
    }

    public function addOnSendFailedCallback(callable $callback): QueueApiClient
    {
        $this->onSendFailedCallbacks[] = $callback;

        return $this;
    }

    public function clearEvents(): QueueApiClient
    {
        $this->onPrepareRequestCallbacks = [];
        $this->onSendSucceedCallbacks = [];
        $this->onSendFailedCallbacks = [];

        return $this;
    }

    public function getStevedoreUnload(int $unloadId): StevedoreUnload
    {
        $request = $this->prepareRequest($this->urls->stevedoreUnloads->single, [
            'id' => $unloadId,
        ]);

        return \Yii::createObject(StevedoreUnload::class, [
            'request' => $request,
            'response' => $this->sendRequest($request),
        ]);
    }

    public function getStevedoreUnloadsListRequest(StevedoreUnloadsFilter $filter = null): Request
    {
        return $this->prepareRequest($this->urls->stevedoreUnloads->list, $filter ? $filter->getParams() : []);
    }

    public function getCitiesListRequest(int $cityId = null): Request
    {
        $queryParams = [];

        if (!is_null($cityId)) {
            $queryParams['city_id'] = $cityId;
        }

        return $this->prepareRequest($this->urls->stevedoreUnloads->citiesList, $queryParams);
    }

    public function getCulturesListRequest(int $unloadId = null): Request
    {
        return $this->prepareRequest($this->urls->cultures->list, [
            'unload_id' => $unloadId,
        ]);
    }

    public function getTruckTypesListRequest(): Request
    {
        return $this->prepareRequest($this->urls->truckTypes->list);
    }

    public function getExportersListRequest(): Request
    {
        return $this->prepareRequest($this->urls->exporters->list);
    }

    /**
     * @return Message|Request
     * @throws InvalidConfigException
     */
    public function getStepGrainOwnersListRequest(): Request
    {
        return $this->prepareRequest($this->urls->stepGrainOwners->list);
    }

    public function createTimeRequest(CreateTimeRequestBody $requestBody): TimeslotRequestsCollection
    {
        $request = $this->prepareRequest($this->urls->timeslotRequests->createTimeRequest)
            ->setMethod('POST')
            ->setData($requestBody->getBody());

        return \Yii::createObject(TimeslotRequestsCollection::class, [
            'request' => $request,
            'response' => $this->sendRequest($request),
        ]);
    }

    public function getAutofillsListRequest(AutofillsListRequestParams $params = null): Request
    {
        return $this->prepareRequest($this->urls->timeslotRequestAutofills->list, $params ? $params->getParams() : []);
    }

    public function getCreateAutofillRequest(AutofillsCreateRequestBody $body): Request
    {
        return $this->prepareRequest($this->urls->timeslotRequestAutofills->create)
            ->setMethod('POST')
            ->setData($body->getBody());
    }

    public function submitTimeslot(SubmitTimeslotRequestBody $body): Timeslot
    {
        $request = $this->prepareRequest($this->urls->timeslots->submitTimeslot)
            ->setMethod('POST')
            ->setData($body->getBody());


        return new Timeslot($request, $this->sendRequest($request));
    }

    public function denyTimeslot(int $timeslotId): Timeslot
    {
        $request = $this->prepareRequest($this->urls->timeslots->submitTimeslot)
            ->setMethod('POST')
            ->setData([
                'timeslot_id' => $timeslotId,
                'submit' => 0,
            ]);

        return \Yii::createObject(Timeslot::class, [
            'request' => $request,
            'response' => $this->sendRequest($request),
        ]);
    }

    public function getDropTimeslotRequest(int $timeslotId): Request
    {
        return $this->prepareRequest($this->urls->timeslots->dropTimeslot, [
            'timeslot_id' => $timeslotId,
        ])->setMethod('DELETE');
    }

    public function getStepSuppliersCheckInnRequest(string $inn): Request
    {
        return $this->prepareRequest($this->urls->stepSuppliers->checkInn, [
            'inn' => $inn,
        ]);
    }

    public function getMyTimeslots(TimeslotsSearchRequestParams $timeslotSearchParams = null): TimeslotsCollection
    {
        $request = $this->prepareRequest(
            $this->urls->pages->myTimeslots,
            $timeslotSearchParams ? $timeslotSearchParams->getParams() : []
        );

        return \Yii::createObject(TimeslotsCollection::class, [
            'request' => $request,
            'response' => $this->sendRequest($request),
        ]);
    }

    public function getTimeslotsInfoFormatted(TimeslotsSearchRequestParams $timeslotSearchParams = null): TimeslotsCollection
    {
        $request = $this->prepareRequest(
            $this->urls->timeslots->listFormatted,
            $timeslotSearchParams ? $timeslotSearchParams->getParams() : []
        );

        return \Yii::createObject(TimeslotsCollection::class, [
            'request' => $request,
            'response' => $this->sendRequest($request),
        ]);
    }

    public function getMyTimeslotsAll(TimeslotsSearchRequestParams $timeslotSearchParams = null): TimeslotsCollection
    {
        $request = $this->prepareRequest(
            $this->urls->pages->myTimeslots,
            $timeslotSearchParams ? $timeslotSearchParams->getParams() : []
        );

        return \Yii::createObject(TimeslotsCollection::class, [
            'request' => $request,
            'response' => $this->sendRequest($request),
        ]);
    }

    /**
     * @param string $route
     * @param array $queryParams
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

        $this->onPrepareRequest($request);

        return $request;
    }

    protected function onPrepareRequest(Request $request): void
    {
        foreach ($this->onPrepareRequestCallbacks as $callback) {
            call_user_func($callback, $request);
        }
    }

    public function sendRequest($request): Response
    {
        try {
            $response = $request->send();
            $this->onSendSuccess($request, $response);

            return $response;

        } catch (Throwable $ex) {

            $requestFailedException = new RequestFailedException($request, $ex->getCode(), $ex);
            $this->onSendFailed($requestFailedException);

            throw $requestFailedException;
        }
    }

    public function onSendSuccess(Request $request, Response $response): void
    {
        foreach ($this->onSendSucceedCallbacks as $callback) {
            call_user_func($callback, $request, $response);
        }
    }

    public function onSendFailed(RequestFailedException $requestFailedException): void
    {
        foreach ($this->onSendFailedCallbacks as $callback) {
            call_user_func($callback, $requestFailedException);
        }
    }
}
