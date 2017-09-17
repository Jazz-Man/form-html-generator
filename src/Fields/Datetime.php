<?php

namespace FormManager\Fields;

use FormManager\Elements\InputDatetime;

/**
 * Class Datetime.
 */
class Datetime extends Field
{
	/**
	 * Datetime constructor.
	 *
	 * @throws \InvalidArgumentException
	 */
	public function __construct()
	{
		parent::__construct(new InputDatetime('Y-m-d\TH:i:sP'));

        $this->input->attr('type', 'datetime');
	}
}
