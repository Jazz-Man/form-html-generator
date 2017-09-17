<?php

namespace FormManager\Traits;

use FormManager\Elements\Label;
use FormManager\Elements\Datalist;

/**
 * Class with label and datalist methods required in InputInterface.
 * @property \FormManager\Elements\Datalist $datalist
 */
trait LabelTrait
{
	protected $labels = [];

	/*
	 * @var Datalist
	 */
	protected $datalist;

	/**
	 * @see InputInterface
	 *
	 * @param \FormManager\Elements\Datalist $datalist
	 *
	 * @return $this
	 */
	public function setDatalist(Datalist $datalist)
	{
		$this->datalist = $datalist;

		return $this;
	}

	/**
	 * @see InputInterface
	 *
	 * @param \FormManager\Elements\Label $label
	 *
	 * @return $this
	 */
	public function addLabel(Label $label)
	{
		$this->labels[] = $label;

		return $this;
	}

	/**
	 * @see InputInterface
	 *
	 * @param \FormManager\Elements\Label $label
	 *
	 * @return $this
	 */
	public function removeLabel(Label $label)
	{
		$key = array_search($label, $this->labels, true);

		if ($key !== false) {
			unset($this->labels[$key]);
		}

		return $this;
	}
}
