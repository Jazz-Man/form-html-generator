<?php

namespace FormManager\Elements;

/**
 * Class InputDatetime
 *
 * @package FormManager\Elements
 */
class InputDatetime extends Input
{
	protected $format;

	/**
	 * InputDatetime constructor.
	 *
	 * @param $format
	 */
	public function __construct($format)
	{
		$this->format = $format;
	}

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

		if ($value instanceof \Datetime) {
			$value = $value->format($this->format);
		}

		$this->attr('value', $value);

		return $this;
	}
}
