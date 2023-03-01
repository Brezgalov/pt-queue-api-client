<?php

namespace Brezgalov\QueueApiClient\RequestBodies;

use yii\base\Component;

class CreateMoveTimeRequestBody extends Component implements IRequestBody
{
    /**
     * @var int
     */
    public $timeslotId;

    /**
     * @var int
     */
    public $time;

    /**
     * CreateMoveTimeRequestBody constructor.
     * @param int|null $timeslotId
     * @param int|null $time
     * @param array $config
     */
    public function __construct($timeslotId = null, $time = null, $config = [])
    {
        parent::__construct($config);

        $this->timeslotId = $timeslotId;
        $this->time = $time;
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        return [
            'timeslot_id' => $this->timeslotId,
            'time' => $this->time,
        ];
    }
}
