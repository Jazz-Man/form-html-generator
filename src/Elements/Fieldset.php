<?php

namespace FormManager\Elements;

use FormManager\ElementInterface;
use FormManager\Fields\Form;

/**
 * Class to manage a fieldset.
 */
class Fieldset extends ElementContainer
{
	protected $name = 'fieldset';

	/**
	 * @see ElementInterface
	 *
	 * @param \FormManager\ElementInterface|null $parent
	 *
	 * @return $this|\FormManager\ElementInterface
	 *
	 * @throws \Exception
	 */
	public function setParent(ElementInterface $parent = null)
	{
		if (!($parent instanceof Form)) {
			throw new \RuntimeException(sprintf('Fieldset only can belong to Form instances. (%s)', get_class($parent)));
		}

		$this->parent = $parent;

		foreach ($this->children as $name => $child) {
			$this->parent->offsetSet($name, $child);
		}

		return $this;
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
		//Add child to itself
		parent::offsetSet($offset, $value);

		//Add the child to the parent
		if ($this->parent instanceof Form) {
			$this->parent->offsetSet($offset, $value);
		}
	}
}
