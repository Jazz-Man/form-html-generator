<?php

namespace FormManager\Elements;

use FormManager\ElementInterface;

/**
 * Class to manage an optgroup of a select.
 */
class Optgroup extends ElementContainer
{
	protected $name = 'optgroup';

	/**
	 * @see ElementInterface
	 *
	 * @param \FormManager\ElementInterface|null $parent
	 *
	 * @return $this|\FormManager\ElementInterface|void
	 *
	 * @throws \Exception
	 */
	public function setParent(ElementInterface $parent = null)
	{
		if (!($parent instanceof Select)) {
			throw new \RuntimeException(sprintf('Optgroups only can belong to Select instances. (%s)', get_class($parent)));
		}

		$this->parent = $parent;

		foreach ($this->children as $name => $child) {
			$this->parent->offsetSet($name, $child);
		}
	}

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
		if ($value instanceof Option) {
			$value->attr('value', $offset);
		} else {
			$value = Option::create($offset, $value);
		}

		parent::offsetSet($offset, $value);
	}
}
