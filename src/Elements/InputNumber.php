<?php

namespace FormManager\Elements;

/**
 * Class InputNumber.
 */
class InputNumber extends Input
{

	/**
	 * @see \FormManager\InputInterface
	 *
	 * @param null $value
	 *
	 * @return $this|array|mixed|null|string
	 *
	 * @throws \InvalidArgumentException
	 */
	public function val($value = null)
	{
		if ($value === null) {
			return $this->attr('value');
		}

		if (is_string($value) && preg_match('/^-?\d+(\.\d+)?$/', $value, $match)) {
			$value = empty($match[1]) ? (int) $value : (float) $value;
		} elseif ($value === '') {
			$value = null;
		}

		$this->attr('value', $value);

		return $this;
	}
}
