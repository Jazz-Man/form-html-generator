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
