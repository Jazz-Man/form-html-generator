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

	/**
	 * @see RenderTrait
	 *
	 * @param string $prepend
	 * @param string $append
	 *
	 * @return string
	 */
	protected function defaultRender($prepend = '', $append = '')
	{
		return "{$prepend}{$this->label} {$this->input} {$this->errorLabel}{$append}";
	}
}
