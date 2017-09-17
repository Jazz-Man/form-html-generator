<?php

namespace FormManager\Fields;

use FormManager\Elements\InputCheckbox;

/**
 * Class Checkbox.
 */
class Checkbox extends Field
{
	/**
	 * Checkbox constructor.
	 */
	public function __construct()
	{
		parent::__construct(new InputCheckbox());
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
		return "{$prepend}{$this->input} {$this->label} {$this->errorLabel}{$append}";
	}
}
