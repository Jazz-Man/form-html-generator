<?php

namespace FormManager\Fields;

/**
 * Class Loader
 *
 * @package FormManager\Fields
 */
class Loader extends Group
{
	/**
	 * Adds new children to this element.
	 *
	 * @param array $children
	 *
	 * @return \FormManager\Fields\Group|\FormManager\Fields\Loader
	 *
	 * @throws \InvalidArgumentException
	 */
	public function add(array $children)
	{
		$allowed = ['loader' => null, 'field' => null];

		if (array_diff_key($children, $allowed)) {
			throw new \InvalidArgumentException("Only 'loader' and 'field' keys are available.");
		}

		return parent::add($children);
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

		/* @var $this \FormManager\Fields\Field[] */

		if ($value === null) {

			return $this['loader']->val() ?: $this['field']->val();
		}


		$this['field']->val($value);

		return $this;
	}
}
