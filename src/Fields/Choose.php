<?php

namespace FormManager\Fields;

/**
 * Class Choose.
 */
class Choose extends Container
{
	protected $value;

	public static $error_message = 'This value is not valid';

	/**
	 * @see ArrayAccess
	 *
	 * @param mixed $offset
	 * @param mixed $value
	 *
	 * @throws \InvalidArgumentException
	 */
	public function offsetSet($offset, $value)
	{
		$value->val($offset);

		parent::offsetSet($offset, $value);
	}

	/**
	 * Loads a value sent by the client.
	 *
	 * @param mixed $value The GET/POST/FILES value
	 *
	 * @return $this
	 */
	public function load($value = null)
	{
		$this->val($value);

		return $this;
	}

	/**
	 * Set/Get values of this container.
	 *
	 * @param null|array $value null to getter, array to setter
	 *
	 * @return mixed
	 */
	public function val($value = null)
	{
		if ($value === null) {
			return $this->value;
		}

		$this->value = $value;

		foreach ($this as $v => $input) {
			if ($v === $value) {
				$input->attr('checked', true);
			} else {
				$input->removeAttr('checked');
			}
		}

		return $this;
	}

	/**
	 * @see InputInterface
	 */
	public function validate()
	{
		$value = $this->val();

		if (!empty($value) && !isset($this[$value])) {
			$this->error(static::$error_message);

			return false;
		}

		return parent::validate();
	}
}
