<?php

namespace FormManager\Fields;

use FormManager\Builder as F;

/**
 * Class Collection.
 */
class Collection extends Group
{
	public $template;

	protected $parentPath;

	/**
	 * Collection constructor.
	 *
	 * @param array|null $children
	 *
	 * @throws \InvalidArgumentException
	 */
	public function __construct(array $children = null)
	{
		$this->template = F::group();

		parent::__construct($children);
	}

	/**
	 * @see ArrayAccess
	 *
	 * @param mixed $offset
	 * @param mixed $value
	 *
	 * @throws \InvalidArgumentException
	 */
	public function offsetSet($offset, $value)
	{
		if ($offset === null) {
			$offset = count($this->children);
		}

		parent::offsetSet($offset, $value);
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
		$this->template->add($children);

		return $this;
	}

	/**
	 * Loads a value sent by the client.
	 *
	 * @param mixed $value The GET/POST/FILES value
	 *
	 * @return $this|\FormManager\Fields\Container
	 */
	public function load($value = null)
	{
		$this->children = [];

		if ($value) {
			foreach ((array)$value as $k => $v) {
				$this->pushLoad($v);
			}
		}

		return $this;
	}

	/**
	 * Set/Get values of this container.
	 *
	 * @param null|array $value null to getter, array to setter
	 *
	 * @return $this|mixed
	 */
	public function val($value = null)
	{
		if ($value === null) {
			return parent::val();
		}

		$this->children = [];

		if ($value) {
			foreach ($value as $v) {
				$this->pushVal($v);
			}
		}

		return $this;
	}

	/**
	 * Returns the template used to create all values.
	 *
	 * @param mixed $template The new template
	 *
	 * @return $this
	 *
	 * @throws \InvalidArgumentException
	 */
	public function setTemplate($template)
	{
		if (is_array($template)) {
			$template = F::group($template);
		} elseif (!($template instanceof Group)) {
			throw new \InvalidArgumentException('Invalid type of the template. Only arrays and FormManager\\Fields\\Group are allowed');
		}

		$this->template = $template;

		return $this;
	}

	/**
	 * Returns the template used to create all values.
	 *
	 * @param mixed $index The index used to generate the input name
	 *
	 * @return \FormManager\Fields\Group
	 */
	public function getTemplate($index = '::n::')
	{
		$template = clone $this->template;

		$template->setParent($this)->setKey($index);

		return $template;
	}

	/**
	 * Adds a new value child.
	 *
	 * @param null|array $value
	 *
	 * @return Group The child inserted
	 */
	public function pushVal($value = null)
	{
		$child = clone $this->template;

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
	 * @return Group The child inserted
	 */
	public function pushLoad($value = null)
	{
		$child = clone $this->template;

		if ($value) {
			if ($this->sanitizer) {
				$value = call_user_func($this->sanitizer, $value);
			}

			$child->load($value);
		}

		return $this[] = $child;
	}
}
