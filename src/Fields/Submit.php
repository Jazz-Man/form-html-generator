<?php

namespace FormManager\Fields;

use FormManager\Elements\Button;

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
		parent::__construct( new Button() );
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
		return "{$prepend}{$this->input}{$append}";
	}
}
