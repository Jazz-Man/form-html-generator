<?php

namespace FormManager\Validators;

/**
 * Class Number.
 */
class Number extends Url
{
	const FILTER = FILTER_VALIDATE_FLOAT;

	public static $error_message = 'This value is not a valid number';
}
