<?php
/**
 * Created by PhpStorm.
 * User: jazzman
 * Date: 9/16/17
 * Time: 8:22 PM
 */

namespace FormManager\Fields;

use FormManager\Elements\HtmlBlock;

/**
 * Class Html
 *
 * @package FormManager\Fields
 */
class Html extends Field
{
    /**
     * @param string $prepend
     * @param string $append
     *
     * @return mixed|string
     */

    /**
     * Html constructor.
     */
    public function __construct()
    {

        parent::__construct(new HtmlBlock());
    }

}
