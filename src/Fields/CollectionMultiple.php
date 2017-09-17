<?php

namespace FormManager\Fields;

use FormManager\Builder as F;

/**
 * Class CollectionMultiple.
 */
class CollectionMultiple extends Collection
{
	public $template = [];

	protected $keyField = 'type';

	/**
	 * CollectionMultiple constructor.
	 *
	 * @param array|null $children
	 *
	 * @throws \InvalidArgumentException
	 */
	public function __construct(array $children = null)
	{
		if ($children) {
			$this->add($children);
		}
	}

	/**
	 * Adds new children to this element.
	 *
	 * @param array $children
	 *
	 * @return $this
	 *
	 * @throws \InvalidArgumentException
	 */
	public function add(array $children)
	{
		foreach ($children as $type => $child) {
			$child = F::group($child);

			if (!isset($child[$this->keyField])) {
				$child[$this->keyField] = F::hidden()->val($type);
			}

			$this->template[$type] = $child;
		}

		return $this;
	}

	/**
	 * @param string $index
	 *
	 * @return array All templates. The index are the template type
	 */
	public function getTemplate($index = '::n::')
	{
		$templates = [];

		foreach ($this->template as $type => $template) {
			$template = clone $template;

			$templates[$type] = $template->setParent($this)->setKey($index);
		}

		return $templates;
	}

	/**
	 * @param null $value
	 *
	 * @return mixed
	 *
	 * @throws \Exception
	 */
	public function pushVal($value = null)
	{
		if (!isset($value[$this->keyField])) {
			throw new \RuntimeException("The value {$this->keyField} is required on add new values in CollectionMultiple");
		}

		$type = $value[$this->keyField];
		$child = clone $this->template[$type];

		if ($value) {
			$child->val($value);
		}

		return $this[] = $child;
	}

	/**
	 * Adds a new value child and load content.
	 *
	 * @param mixed $value The GET/POST/FILES value
	 *
	 * @return \FormManager\Fields\Group The child inserted
	 *
	 * @throws \RuntimeException
	 */
	public function pushLoad($value = null)
	{
		if (!isset($value[$this->keyField])) {
			throw new \RuntimeException("The value {$this->keyField} is required on add new values in CollectionMultiple");
		}

		$type = $value[$this->keyField];
		$child = clone $this->template[$type];
		$child->load($value);

		return $this[] = $child;
	}
}
