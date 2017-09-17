<?php

namespace FormManager\Validators;

use FormManager\InputInterface;
use FormManager\InvalidValueException;

/**
 * Class Select.
 */
class Select
{
	public static $error_message = 'This value is not valid';

	/**
	 * Validates the input value according to this attribute.
	 *
	 * @param InputInterface $input The input to validate
	 *
	 *
	 * @throws InvalidValueException If the value is not valid
	 * @throws \InvalidArgumentException
	 */
	public static function validate(InputInterface $input)
	{

		/** @var \FormManager\Fields\Field|\FormManager\Elements\Datalist $input */

		if (!($value = $input->val())) {
			return;
		}

		if ($input->attr('multiple')) {
			if (array_keys(array_diff_key(array_flip($value), $input->options()))) {
				throw new InvalidValueException(sprintf(static::$error_message));
			}
		} elseif (!isset($input[$value])) {
			throw new InvalidValueException(sprintf(static::$error_message));
		}
	}
}
