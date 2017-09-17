<?php

namespace FormManager\Fields;

use FormManager\Elements\Textarea as TextareaElement;

/**
 * Class Textarea.
 */
class Textarea extends Field
{
	/**
	 * Textarea constructor.
	 */
	public function __construct()
	{
		parent::__construct(new TextareaElement());
	}
}
