<?php

namespace FormManager\Fields;

use FormManager\Elements\Select as SelectElement;

/**
 * Class Select.
 */
class Select extends FieldContainer
{
	/**
	 * Select constructor.
	 *
	 * @param array|null $options
	 *
	 * @throws \InvalidArgumentException
	 */
	public function __construct(array $options = null)
	{
		parent::__construct(new SelectElement());

		if ($options) {
			$this->input->options($options);
		}
	}
}
