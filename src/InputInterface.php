<?php

namespace FormManager;

use FormManager\Elements\Datalist;
use FormManager\Elements\Label;

/**
 * Interface used by all input elements.
 */
interface InputInterface extends FieldInterface
{
	/**
	 * Set the datalist associated with this input.
	 *
	 * @param Datalist $datalist
	 *
	 * @return $this
	 */
	public function setDatalist(Datalist $datalist);

	/**
	 * Add a new label to this input.
	 *
	 * @param Label $label
	 *
	 * @return $this
	 */
	public function addLabel(Label $label);

	/**
	 * Remove the label from this input.
	 *
	 * @param Label $label
	 *
	 * @return $this
	 */
	public function removeLabel(Label $label);
}
