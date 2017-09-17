<?php

namespace FormManager\Fields;

use FormManager\Elements\InputDatetime;

/**
 * Class Month.
 */
class Month extends Field
{
	/**
	 * Month constructor.
	 *
	 * @throws \InvalidArgumentException
	 */
	public function __construct()
	{

		parent::__construct(new InputDatetime('Y-m'));

		$this->input->attr('type', 'month');
	}
}
