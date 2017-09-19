<?php

namespace FormManager\Fields;

use FormManager\Elements\Input;

/**
 * Class Email.
 */
class Email extends Field
{
	/**
	 * Email constructor.
	 */
	public function __construct()
	{
		parent::__construct(new Input());

		$this->input->attr('type', 'email');
	}
}
