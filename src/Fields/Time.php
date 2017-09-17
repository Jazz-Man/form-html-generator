<?php

namespace FormManager\Fields;

use FormManager\Elements\InputDateTime;

/**
 * Class Time.
 */
class Time extends Field
{
    /**
     * Time constructor.
     *
     * @throws \InvalidArgumentException
     */
    public function __construct()
    {
        parent::__construct(new InputDatetime('H:i:s'));
        $this->input->attr('type', 'time');
    }
}
