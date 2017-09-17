<?php

namespace FormManager\Fields;

use FormManager\Elements\Input;

/**
 * Class Color.
 */
class Color extends Field
{
	/**
	 * Color constructor.
	 */
	public function __construct()
	{
		parent::__construct(new Input());

		$this->input->attr('type', 'color');
		$this->input->addValidator('FormManager\\Validators\\Color::validate');
	}
}
