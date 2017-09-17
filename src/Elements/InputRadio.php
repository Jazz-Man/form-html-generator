<?php

namespace FormManager\Elements;

use FormManager\InputInterface;

/**
 * Class InputRadio.
 */
class InputRadio extends InputCheckbox implements InputInterface
{
	protected $attributes = ['type' => 'radio'];

	/**
	 * @see InputInterface
	 *
	 * @param null $value
	 *
	 * @return $this
	 *
	 * @throws \InvalidArgumentException
	 */
	public function load($value = null)
	{
		if (!empty($value) && ($this->attr('value') === $value)) {
			$this->check();
		} else {
			$this->uncheck();
		}
	}

	/**
	 * @see InputInterface
	 *
	 * @param null $value
	 *
	 * @return $this
	 *
	 * @throws \InvalidArgumentException
	 */
	public function val($value = null)
	{
		if ($value === null) {
			return $this->attr('checked') ? $this->attr('value') : null;
		}

		$this->attr('value', $value);

		return $this;
	}
}
