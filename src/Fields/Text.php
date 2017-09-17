<?php

namespace FormManager\Fields;

use FormManager\Elements\Input;

/**
 * Class Text.
 */
class Text extends Field
{
    /**
     * Text constructor.
     *
     * @throws \InvalidArgumentException
     */
    public function __construct()
    {
        parent::__construct(new Input());
        $this->input->attr('type', 'text');
    }
}
