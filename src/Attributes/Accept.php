<?php

namespace FormManager\Attributes;

use FormManager\InputInterface;

/**
 * Class Accept.
 */
class Accept implements AttributeInterface
{
	/**
	 * @param \FormManager\InputInterface $input
	 * @param mixed                       $value
	 *
	 * @return mixed
	 */
	public static function onAdd(InputInterface $input, $value)
	{
		$input->addValidator('FormManager\\Validators\\Accept::validate');

		return $value;
	}

	/**
	 * @param \FormManager\InputInterface $input
	 */
	public static function onRemove(InputInterface $input)
	{
		$input->removeValidator('FormManager\\Validators\\Accept::validate');
	}
}
