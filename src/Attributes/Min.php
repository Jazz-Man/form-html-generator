<?php

namespace FormManager\Attributes;

use FormManager\InputInterface;

/**
 * Class Min.
 */
class Min extends Max
{
	/**
	 * Add the validator for this input.
	 *
	 * @param InputInterface $input
	 */
	protected static function addValidator(InputInterface $input)
	{
		$input->addValidator('FormManager\\Validators\\Min::validate');
	}

	/**
	 * Add the validator for this date-time input.
	 *
	 * @param InputInterface $input
	 */
	protected static function addDatetimeValidator(InputInterface $input)
	{
		$input->addValidator('FormManager\\Validators\\Min::validateDatetime');
	}

	/**
	 * @param \FormManager\InputInterface $input
	 */
	public static function onRemove(InputInterface $input)
	{
		$input->removeValidator('FormManager\\Validators\\Min::validateDatetime');
		$input->removeValidator('FormManager\\Validators\\Min::validate');
	}
}
