<?php

namespace FormManager\Fields;

use FormManager\Elements\Input;

/**
 * Class Submit.
 */
class Submit extends Field
{
	/**
	 * Submit constructor.
	 *
	 * @throws \InvalidArgumentException
	 */
	public function __construct()
	{
		parent::__construct( new Input() );
		$this->input->attr('type', 'submit');
	}

	/**
	 * Buttons has no label, so the label text will go inside the button.
	 *
	 * @param null $html
	 *
	 * @return \FormManager\Fields\Field|mixed
	 */
	public function label($html = null)
	{
		return $this->__call('html', func_get_args());
	}

}
