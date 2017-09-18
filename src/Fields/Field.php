<?php

namespace FormManager\Fields;

use FormManager\ElementInterface;
use FormManager\Elements;
use FormManager\FieldInterface;
use FormManager\InputInterface;
use FormManager\Traits\RenderTrait;

/**
 * Class to manage the combination of an input with other elements.
 * @method $this placeholder($value = null)
 * @method $this required(bool $required = true)
 * @method Elements\Element addClass($class)
 * @method CollectionMultiple|Collection getTemplate()
 * @method Select options(array $options = null)
 *
 */
abstract class Field implements FieldInterface
{
	use RenderTrait;

	public $input;
	public $label;
	public $errorLabel;
	public $datalist;

	/**
	 * Field constructor.
	 *
	 * @param \FormManager\InputInterface $input
	 */
	protected function __construct(InputInterface $input)
	{
		$this->input = $input;
		$this->label = new Elements\Label($this->input);
		$this->errorLabel = new Elements\ErrorLabel($this->input);
		$this->datalist = new Elements\Datalist($this->input);
		$this->wrapper = new Elements\Div();
	}

	/**
	 * Clones the input and other properties.
	 */
	public function __clone()
	{
		$this->input = clone $this->input;

		if ($this->label) {
			$this->input->removeLabel($this->label);
			$this->label = clone $this->label;
			$this->label->setInput($this->input);
		}

		if ($this->errorLabel) {
			$this->input->removeLabel($this->errorLabel);
			$this->errorLabel = clone $this->errorLabel;
			$this->errorLabel->setInput($this->input);
		}

		if ($this->datalist) {
			$this->datalist = clone $this->datalist;
			$this->datalist->setInput($this->input);
		}

		if ($this->wrapper) {
			$this->wrapper = clone $this->wrapper;
		}
	}

	/**
	 * Magic method to pass all undefined methods to input.
	 *
	 * @param string $name
	 * @param array  $arguments
	 *
	 * @return $this
	 */
	public function __call($name, $arguments)
	{
		$return = call_user_func_array([$this->input, $name], $arguments);

		if ($return === $this->input) {
			return $this;
		}

		return $return;
	}

	/**
	 * Creates/edit/returns the content of the label.
	 *
	 * @param null|string $html
	 *
	 * @return \FormManager\Elements\Label|\FormManager\Fields\Field|$this
	 *
	 * @throws \BadMethodCallException
	 */
	public function label($html = null)
	{
		if (empty($this->label)) {
			throw new \BadMethodCallException('No label allowed for this field');
		}

		if ($html === null) {
			return $this->label->html();
		}

		$this->label->html($html);

		return $this;
	}

	/**
	 * Adds html attributes to the label.
	 *
	 * @param array $attrs
	 *
	 * @return $this
	 *
	 * @throws \BadMethodCallException
	 */
	public function labelAttr(array $attrs)
	{
		if (empty($this->label)) {
			throw new \BadMethodCallException('No label allowed for this field');
		}

		$this->label->attr($attrs);

		return $this;
	}

	/**
	 * Adds html attributes to the wrapper.
	 *
	 * @param array $attrs
	 *
	 * @return $this
	 * @throws \BadMethodCallException
	 **/
	public function wrapperAttr(array $attrs)
	{
		if (empty($this->wrapper)) {
			throw new \BadMethodCallException('No wrapper allowed for this field');
		}

		$this->wrapper->attr($attrs);

		return $this;
	}

	/**
	 * Creates/edit/returns the content of the datalist associated with the input.
	 *
	 * @param null|array $options
	 *
	 * @return $this|array|\FormManager\Elements\Datalist
	 *
	 * @throws \InvalidArgumentException
	 * @throws \BadMethodCallException
	 */
	public function datalist(array $options = null)
	{
		if (empty($this->datalist)) {
			throw new \BadMethodCallException('No datalist allowed for this field');
		}

		if ($options === null) {
			return $this->datalist->options();
		}

		$this->datalist->options($options);

		return $this;
	}

	/**
	 * @see FieldInterface
	 */
	public function __toString()
	{
		return $this->toHtml();
	}

	/**
	 * @see FieldInterface
	 *
	 * @param null $name
	 * @param null $value
	 *
	 * @return $this
	 */
	public function attr($name = null, $value = null)
	{
		return $this->__call('attr', func_get_args());
	}

	/**
	 * @see FieldInterface
	 *
	 * @param string $name
	 *
	 * @return $this|\FormManager\ElementInterface
	 */
	public function removeAttr($name)
	{
		$this->input->removeAttr($name);

		return $this;
	}

	/**
	 * @see FieldInterface
	 *
	 * @param null $id
	 *
	 * @return $this
	 */
	public function id($id = null)
	{
		return $this->__call('id', func_get_args());
	}

	/**
	 * @see FieldInterface
	 *
	 * @param \FormManager\ElementInterface|null $parent
	 *
	 * @return $this|\FormManager\ElementInterface
	 */
	public function setParent(ElementInterface $parent = null)
	{
		$this->input->setParent($parent);

		return $this;
	}

	/**
	 * @see FieldInterface
	 *
	 * @return \FormManager\ElementInterface|null
	 */
	public function getParent()
	{
		return $this->input->getParent();
	}

	/**
	 * @see FieldInterface
	 */
	public function getForm()
	{
		return $this->input->getForm();
	}

	/**
	 * @see FieldInterface
	 *
	 * @param mixed $key
	 *
	 * @return $this|\FormManager\FieldInterface
	 */
	public function setKey($key)
	{
		$this->input->setKey($key);

		return $this;
	}

	/**
	 * @see FieldInterface
	 *
	 * @return null|string
	 */
	public function getPath()
	{
		return $this->input->getPath();
	}

	/**
	 * @see FieldInterface
	 *
	 * @param callable $validator
	 *
	 * @return $this|\FormManager\FieldInterface
	 */
	public function addValidator(callable $validator)
	{
		$this->input->addValidator($validator);

		return $this;
	}

	/**
	 * @see FieldInterface
	 *
	 * @param callable $validator
	 *
	 * @return $this|\FormManager\FieldInterface
	 */
	public function removeValidator($validator)
	{
		$this->input->removeValidator($validator);

		return $this;
	}

	/**
	 * @see FieldInterface
	 *
	 * @param callable $sanitizer
	 *
	 * @return $this|\FormManager\FieldInterface
	 */
	public function sanitize(callable $sanitizer)
	{
		$this->input->sanitize($sanitizer);

		return $this;
	}

	/**
	 * @see FieldInterface
	 *
	 * @param null $value
	 *
	 * @return $this|\FormManager\FieldInterface
	 */
	public function load($value = null)
	{
		$this->input->load($value);

		return $this;
	}

	/**
	 * @see FieldInterface
	 *
	 * @param null $value
	 *
	 * @return mixed
	 */
	public function val($value = null)
	{
		return $this->__call('val', func_get_args());
	}

	/**
	 * @see FieldInterface
	 *
	 * @return bool
	 */
	public function validate($test = null)
	{
		return $this->input->validate();
	}

	/**
	 * @see FieldInterface
	 *
	 * @param null $error
	 *
	 * @return $this|Field|mixed|string
	 */
	public function error($error = null)
	{
		return $this->__call('error', func_get_args());
	}

	/**
	 * @see RenderTrait
	 *
	 * @param string $prepend
	 * @param string $append
	 *
	 * @return string
	 */
	protected function defaultRender($prepend = '', $append = '')
	{
		return "{$prepend}{$this->label}{$this->input}{$this->datalist}{$this->errorLabel}{$append}";
	}
}
