<?php

namespace FormManager\Elements;

/**
 * Class Textarea
 *
 * @package FormManager\Elements
 */
class Textarea extends Input
{
	protected $name = 'textarea';
	protected $close = true;

	/**
	 * @see InputInterface
	 *
	 * @param null $value
	 *
	 * @return $this
	 */
	public function val($value = null)
	{
		if ($value === null) {
			return $this->html;
		}
		$this->html = $value;

		return $this;
	}

	/**
	 * Set/Get the html content for this element.
	 *
	 * @param null|string $html null to getter, string to setter
	 *
	 * @return mixed
	 */
	public function html($html = null)
	{
		if ($html === null) {
			return static::escape($this->html);
		}

		return $this->val($html);
	}
}
