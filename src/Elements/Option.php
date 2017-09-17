<?php

namespace FormManager\Elements;

/**
 * Class to manage an option of a select.
 */
class Option extends Element
{
	protected $name = 'option';
	protected $close = true;

	/**
	 * Creates a new option.
	 *
	 * @param string $value
	 * @param mixed  $attributes
	 *
	 * @return static
	 */
	public static function create($value, $attributes = null)
	{
		$option = new static();
		$option->attr('value', $value);

		if (!is_array($attributes)) {
			return $option->html($attributes ?: $value);
		}

		foreach ((array) $attributes as $n => $v) {
			$option->$n($v);
		}

		if (!$option->html()) {
			$option->html($value);
		}

		return $option;
	}

	/**
	 * @return $this|array|mixed|null|string
	 */
	public function check()
	{
		return $this->attr('selected', true);
	}

	/**
	 * @return $this|\FormManager\ElementInterface
	 */
	public function uncheck()
	{
		return $this->removeAttr('selected');
	}
}
