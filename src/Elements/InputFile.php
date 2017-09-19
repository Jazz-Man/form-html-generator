<?php

namespace FormManager\Elements;

use Psr\Http\Message\UploadedFileInterface;

/**
 * Class InputFile
 *
 * @package FormManager\Elements
 */
class InputFile extends Input
{
	protected $attributes = ['type' => 'file'];
	protected $value;


	/**
	 * @see \FormManager\InputInterface
	 *
	 * @param null $value
	 *
	 * @return $this|\FormManager\FieldInterface
	 */
	public function load($value = null)
	{
		$this->val($value ?: '');

		return $this;
	}

	/**
	 * @see InputInterface
	 *
	 * @param null $value
	 *
	 * @return $this
	 */
	public function val($value = null)
	{
		if ($value === null) {
			return $this->value;
		}

		$error = null;

		if ($value instanceof UploadedFileInterface) {
			$error = $value->getError();
		} elseif (isset($value['error'])) {
			$error = $value['error'];
		}

		if ($error === UPLOAD_ERR_NO_FILE) {
			$value = null;
		}

		$this->value = $value;

		return $this;
	}
}
