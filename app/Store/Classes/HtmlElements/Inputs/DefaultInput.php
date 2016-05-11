<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 03/05/2016
 * Time: 10:48
 */

namespace Store\Classes\HtmlElements\Inputs;


use Store\Interfaces\IHtmlBuilder;
use Store\Interfaces\IInput;

class DefaultInput extends InputBase implements IHtmlBuilder
{
    protected $class;

    public function __construct($type, $name, $class)
    {
        parent::__construct($type, $name);
        $this->class = $class;
    }

    public function getAsHtml()
    {
        $label = ucfirst($this->name) . ":";
        $inputAsHtml =
            "\t \t \t<tr> \n" .
            "\t \t \t \t<td>$label<td> \n" .
            "\t \t \t \t<td><input class='$this->class' type='$this->type' name='$this->name'/><td> \n" .
            "\t \t \t</tr> \n";
        return $inputAsHtml;
    }
}