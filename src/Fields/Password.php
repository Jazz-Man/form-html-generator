<?php

namespace FormManager\Fields;

use FormManager\Elements\Input;

/**
 * Class Password.
 */
class Password extends Field
{
	/**
	 * Password constructor.
	 *
	 * @throws \InvalidArgumentException
	 */
	public function __construct()
	{
		parent::__construct( new Input());

		$this->input->attr('type', 'password');
	}
}
