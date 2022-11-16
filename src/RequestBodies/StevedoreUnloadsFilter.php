<?php

namespace Brezgalov\QueueApiClient\RequestBodies;

use yii\base\Component;

class StevedoreUnloadsFilter extends Component implements IRequestParams
{
    /**
     * @var null|int
     */
    public $id;

    /**
     * @var null|int
     */
    public $cityId;

    /**
     * @return array
     */
    public function getParams(): array
    {
        $result = [];

        if (!is_null($this->id)) {
            $result['id'] = $this->id;
        }

        if (!is_null($this->cityId)) {
            $result['city_id'] = $this->cityId;
        }

        return $result;
    }
}
