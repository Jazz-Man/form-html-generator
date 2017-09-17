<?php

namespace FormManager\Elements;

/**
 * Class ErrorLabel.
 */
class ErrorLabel extends Label
{
	protected $attributes = ['class' => 'error'];

	/**
	 * Set/Get the html content for this element.
	 *
	 * @param null|string $html null to getter, string to setter
	 *
	 * @return mixed
	 */
	public function html($html = null)
	{
		return $this->input->error();
	}
}
