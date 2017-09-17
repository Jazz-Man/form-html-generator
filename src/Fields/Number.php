<?php

namespace FormManager\Fields;

use FormManager\Elements\InputNumber;

/**
 * Class Number.
 */
class Number extends Field
{
	/**
	 * Number constructor.
	 *
	 * @throws \InvalidArgumentException
	 */
	public function __construct()
	{
		parent::__construct( new InputNumber());

		$this->input->attr('type', 'number');
	}
}
