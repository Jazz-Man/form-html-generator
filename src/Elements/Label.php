<?php

namespace FormManager\Elements;

use FormManager\InputInterface;

/**
 * Class Label.
 * @property \FormManager\Fields\Field $input
 */
class Label extends Element
{
	protected $name = 'label';
	protected $close = true;
	protected $input;

	/**
	 * Label constructor.
	 *
	 * @param InputInterface|null $input The input associated to this label
	 */
	public function __construct(InputInterface $input = null)
	{
		if ($input) {
			$this->setInput($input);
		}
	}

	/**
	 * Sets a new input associated to this label.
	 *
	 * @param InputInterface $input The input instance
	 */
	public function setInput(InputInterface $input)
	{
		//Ensure the label and input have ids defined
		$this->id();
		$input->id();

		//Assign the relation to each other
		$this->input = $input;
		$input->addLabel($this);
	}

	/**
	 * Converts the label to html code.
	 *
	 * @param string $prepend Optional string prepended to html content
	 * @param string $append  Optional string appended to html content
	 *
	 * @return string
	 */
	public function toHtml($prepend = '', $append = '')
	{
		//Do not print empty labels
		if (mb_strlen($this->html().$prepend.$append) === 0) {
			return '';
		}

		if ($this->input) {
			$this->attr('for', $this->input->id());
		}

		return parent::toHtml($prepend, $append);
	}
}
