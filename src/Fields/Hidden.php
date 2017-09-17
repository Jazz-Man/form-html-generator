<?php

namespace FormManager\Fields;

use FormManager\Elements\Input;

/**
 * Class Hidden.
 */
class Hidden extends Field
{
	/**
	 * Hidden constructor.
	 */
	public function __construct()
	{
		parent::__construct(new Input());

		$this->input->attr('type', 'hidden');
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
