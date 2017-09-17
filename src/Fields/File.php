<?php

namespace FormManager\Fields;

use FormManager\Elements\InputFile;

/**
 * Class File.
 */
class File extends Field
{
	/**
	 * File constructor.
	 */
	public function __construct()
	{
		parent::__construct(new InputFile());
	}
}
