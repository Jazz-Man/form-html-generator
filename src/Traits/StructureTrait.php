<?php

namespace FormManager\Traits;

/**
 * Trait with common methods to build the data structure.
 */
trait StructureTrait
{
	protected $key;

	/**
	 * @see InputInterface
	 *
	 * @param $key
	 *
	 * @return $this
	 */
	public function setKey($key)
	{
		$this->key = $key;

		return $this;
	}

	/**
	 * @see InputInterface
	 * @return \FormManager\Fields\Form|\FormManager\Fields\Group|string
	 */
	public function getPath()
	{
		if (!($parent = $this->getParent())) {
			return;
		}
		/** @var \FormManager\Fields\Field $parent */

		$path = $parent->getPath();

		if ($path) {
			if (mb_strpos($this->key, '[') !== false) {
				list($p1, $p2) = explode('[', $this->key, 2);

				return "{$path}[{$p1}][{$p2}";
			}

			if ($this->key !== null) {
				return "{$path}[{$this->key}]";
			}

			return $path;
		}

		if ($this->key) {
			return $this->key;
		}
	}

	/**
	 * Returns the element parent.
	 *
	 * @see \FormManager\TreeInterface
	 *
	 * @return null|\FormManager\ElementInterface
	 */
	abstract public function getParent();
}
