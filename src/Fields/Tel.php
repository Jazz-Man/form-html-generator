<?php

namespace FormManager\Fields;

use FormManager\Elements\Input;

/**
 * Class Tel.
 */
class Tel extends Field
{
    /**
     * Tel constructor.
     *
     * @throws \InvalidArgumentException
     */
    public function __construct()
    {
        parent::__construct(new Input());
        $this->input->attr('type', 'tel');
    }
}
