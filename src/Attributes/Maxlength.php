<?php

namespace FormManager\Attributes;

use FormManager\InputInterface;

/**
 * Class Maxlength
 *
 * @package FormManager\Attributes
 */
class Maxlength implements AttributeInterface
{
	/**
	 * @param \FormManager\InputInterface $input
	 * @param mixed                       $value
	 *
	 * @return mixed
	 *
	 * @throws \InvalidArgumentException
	 */
	public static function onAdd(InputInterface $input, $value)
	{
		if (!is_int($value) || ($value < 0)) {
			throw new \InvalidArgumentException('The maxlength value must be a non-negative integer');
		}

		$input->addValidator('FormManager\\Validators\\Maxlength::validate');

		return $value;
	}

	/**
	 * @param \FormManager\InputInterface $input
	 */
	public static function onRemove(InputInterface $input)
	{
		$input->removeValidator('FormManager\\Validators\\Maxlength::validate');
	}
}
