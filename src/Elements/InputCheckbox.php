<?php

namespace FormManager\Elements;

/**
 * Class InputCheckbox.
 */
class InputCheckbox extends Input
{
	protected $attributes = ['type' => 'checkbox', 'value' => 'on'];

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
		if ($this->evalValue($value)) {
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
		if ($this->evalValue($value)) {
			$this->check();
		} else {
			$this->uncheck();
		}

		return $this;
	}

	/**
	 * @return $this|array|mixed|null|string
	 *
	 * @throws \InvalidArgumentException
	 */
	public function check()
	{
		return $this->attr('checked', true);
	}

	/**
	 * @return $this|\FormManager\ElementInterface
	 */
	public function uncheck()
	{
		return $this->removeAttr('checked');
	}

	/**
	 * @param $value
	 *
	 * @return bool
	 *
	 * @throws \InvalidArgumentException
	 */
	private function evalValue($value)
	{
		return ((string) $this->attr('value') === (string) $value) || filter_var($value, FILTER_VALIDATE_BOOLEAN);
	}
}
