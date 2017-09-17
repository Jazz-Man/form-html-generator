<?php

namespace FormManager\Fields;

use FormManager\Elements\Input;

/**
 * Class Url.
 */
class Url extends Field
{
	/**
	 * Url constructor.
	 *
	 * @throws \InvalidArgumentException
	 */
	public function __construct()
	{
		parent::__construct(new Input());
		$this->input->attr('type', 'url');
		$this->addValidator('FormManager\\Validators\\Url::validate');
	}
}
