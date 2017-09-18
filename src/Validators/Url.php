<?php

namespace FormManager\Validators;

use FormManager\InputInterface;
use FormManager\InvalidValueException;

/**
 * Class Url
 *
 * @package FormManager\Validators
 */
class Url
{
	const FILTER = FILTER_VALIDATE_URL;

	public static $error_message = 'This value is not a valid url';

	/**
	 * Validates the input value according to this attribute.
	 *
	 * @param InputInterface $input The input to validate
	 *
	 * @throws InvalidValueException If the value is not valid
	 */
	public static function validate(InputInterface $input)
	{
		$value = $input->val();

		if (!empty($value) && filter_var($value, static::FILTER) === false) {
			throw new InvalidValueException(sprintf(static::$error_message, $value));
		}
	}
}
