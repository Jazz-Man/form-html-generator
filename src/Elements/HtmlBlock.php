<?php

namespace FormManager\Elements;

use FormManager\InputInterface;

/**
 * Class HtmlBlock
 *
 * @package FormManager\Elements
 */
class HtmlBlock extends Element implements InputInterface
{


    protected $name = 'div';
    protected $close = true;


    /**
     * Set the key used to calculate the path of this node.
     *
     * @param mixed $key
     *
     * @return $this
     */
    public function setKey($key)
    {
        // TODO: Implement setKey() method.
    }

    /**
     * Get the full path of this node
     * Used to calculate the real name of each input.
     *
     * @return null|string
     */
    public function getPath()
    {
        // TODO: Implement getPath() method.
    }

    /**
     * push a new validator.
     *
     * @param callable $validator
     *
     * @return $this
     */
    public function addValidator(callable $validator)
    {
        // TODO: Implement addValidator() method.
    }

    /**
     * Removes a validator.
     *
     * @param callable $validator
     *
     * @return $this
     */
    public function removeValidator($validator)
    {
        // TODO: Implement removeValidator() method.
    }

    /**
     * Register a sanitize for the value of this input.
     *
     * @param callable $sanitizer
     *
     * @return $this
     */
    public function sanitize(callable $sanitizer)
    {
        // TODO: Implement sanitize() method.
    }

    /**
     * Loads a value sent by the client.
     *
     * @param mixed $value The GET/POST/FILES values merged in an unique array
     *
     * @return $this
     */
    public function load($value = null)
    {
        // TODO: Implement load() method.
    }

    /**
     * Set/Get the value.
     *
     * @param mixed $value null to getter, mixed to setter
     *
     * @return mixed
     */
    public function val($value = null)
    {
        // TODO: Implement val() method.
    }

    /**
     * Checks if the value is valid.
     *
     * @return bool
     */
    public function validate($test = null)
    {
        // TODO: Implement validate() method.
    }

    /**
     * Set/Get the current error message.
     *
     * @param null|string $error null to getter, string to setter
     *
     * @return string|$this
     */
    public function error($error = null)
    {
        // TODO: Implement error() method.
    }

    /**
     * Set the datalist associated with this input.
     *
     * @param Datalist $datalist
     *
     * @return $this
     */
    public function setDatalist(Datalist $datalist)
    {
        // TODO: Implement setDatalist() method.
    }

    /**
     * Add a new label to this input.
     *
     * @param Label $label
     *
     * @return $this
     */
    public function addLabel(Label $label)
    {
        // TODO: Implement addLabel() method.
    }

    /**
     * Remove the label from this input.
     *
     * @param Label $label
     *
     * @return $this
     */
    public function removeLabel(Label $label)
    {
        // TODO: Implement removeLabel() method.
    }
}
