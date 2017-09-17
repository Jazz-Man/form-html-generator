<?php

namespace FormManager\Fields;

/**
 * Class Group
 *
 * @package FormManager\Fields
 * @method CollectionMultiple getTemplate()
 */
class Group extends Container
{
	/**
	 * Offset to set.
	 *
	 * @see ArrayAccess
	 *
	 * @param mixed $offset
	 * @param mixed $value
	 *
	 * @throws \InvalidArgumentException
	 */
	public function offsetSet($offset, $value)
	{
		parent::offsetSet($offset, $value);

		$value->setKey($offset);
	}
}
