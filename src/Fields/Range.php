<?php

namespace FormManager\Fields;

use FormManager\Elements\InputNumber;

/**
 * Class Range.
 */
class Range extends Field
{
    /**
     * Range constructor.
     *
     * @throws \InvalidArgumentException
     */
    public function __construct()
    {
        parent::__construct(new InputNumber());

        $this->input->attr('type', 'range');
    }
}
