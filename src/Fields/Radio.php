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
