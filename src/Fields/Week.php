<?php

namespace FormManager\Fields;

use FormManager\Elements\InputDatetime;

/**
 * Class Week.
 */
class Week extends Field
{
    /**
     * Week constructor.
     *
     * @throws \InvalidArgumentException
     */
    public function __construct()
    {
        parent::__construct(new InputDatetime('Y-\WW'));
        $this->input->attr('type', 'week');
    }
}
