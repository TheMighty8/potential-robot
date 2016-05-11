<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 06/05/2016
 * Time: 10:19
 */

namespace Store\Classes\HtmlElements\Inputs;

use Store\Interfaces\IHtmlBuilder;

class TextAreaInput implements IHtmlBuilder
{
    protected $name;
    protected $class;
    protected $label;

    public function __construct($name, $class)
    {
        $this->name = $name;
        $this->class = $class;
        $this->label = ucfirst($name) . ":";
    }

    public function getAsHtml()
    {
        return
            "\t \t \t<tr> \n" .
            "\t \t \t \t<td>{$this->label}<td> \n" .
            "\t \t \t \t<td> <textarea class='{$this->class}' name='{$this->name}' rows='5'> </textarea> \n" .
            "\t \t \t</tr> \n";
    }
}