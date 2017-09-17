<?php

namespace FormManager\Fields;

use FormManager\Elements\InputRadio;

/**
 * Class Radio.
 */
class Radio extends Field
{
	/**
	 * Radio constructor.
	 */
	public function __construct()
	{
		parent::__construct(new InputRadio());
	}
}
