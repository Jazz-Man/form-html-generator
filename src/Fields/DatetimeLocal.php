<?php

namespace FormManager\Fields;

use FormManager\Elements\InputDatetime;

/**
 * Class DatetimeLocal.
 */
class DatetimeLocal extends Field
{
	/**
	 * DatetimeLocal constructor.
	 *
	 * @throws \InvalidArgumentException
	 */
	public function __construct()
	{
		parent::__construct((new InputDatetime('Y-m-d\TH:i:s'))->attr('type', 'datetime-local'));
	}
}
