<?php

namespace FormManager\Fields;

use FormManager\Elements\InputDatetime;

/**
 * Class Date.
 */
class Date extends Field
{
	/**
	 * Date constructor.
	 *
	 * @throws \InvalidArgumentException
	 */
	public function __construct()
	{
		parent::__construct(new InputDatetime('Y-m-d'));

        $this->input->attr('type', 'date');
	}
}
