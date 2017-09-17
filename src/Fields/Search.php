<?php

namespace FormManager\Fields;

use FormManager\Elements\Input;

/**
 * Class Search.
 */
class Search extends Field
{
    /**
     * Search constructor.
     *
     * @throws \InvalidArgumentException
     */
    public function __construct()
    {
        parent::__construct(new Input());

        $this->input->attr('type', 'search');
    }
}
