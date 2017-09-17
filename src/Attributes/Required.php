<?php

namespace FormManager\Attributes;

use FormManager\InputInterface;

/**
 * Class Required.
 */
class Required
{
	/**
	 * @param \FormManager\InputInterface $input
	 * @param                             $value
	 *
	 * @return mixed
	 *
	 * @throws \InvalidArgumentException
	 */
	public static function onAdd(InputInterface $input, $value)
	{
		if (!is_bool($value)) {
			throw new \InvalidArgumentException('The required value must be a boolean');
		}

		$input->addValidator('FormManager\\Validators\\Required::validate');

		return $value;
	}

	/**
	 * @param \FormManager\InputInterface $input
	 */
	public static function onRemove(InputInterface $input)
	{
		$input->removeValidator('FormManager\\Validators\\Required::validate');
	}
}
