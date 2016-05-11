<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 03/05/2016
 * Time: 10:43
 */

namespace Store\Classes\HtmlElements\Inputs;

use Store\Interfaces\IHtmlBuilder;

abstract class InputBase implements IHtmlBuilder
{
    protected $type;
    protected $name;

    public function __construct($type, $name)
    {
        $this->type = $type;
        $this->name = $name;
    }
}