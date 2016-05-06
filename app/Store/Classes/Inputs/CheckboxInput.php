<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 06/05/2016
 * Time: 09:43
 */

namespace Store\Classes\Inputs;


use Store\Interfaces\IHtmlBuilder;

class CheckboxInput extends DefaultInput implements IHtmlBuilder
{
    private $value;

    public function __construct($type, $name, $class, $value)
    {
        parent::__construct($type, $name, $class);
        $this->value = $value;
    }

    public function getAsHtml()
    {
        $label = ucfirst($this->name) . ":";
        $inputAsHtml =
            "\t \t \t<tr> \n" .
            "\t \t \t \t<td>$label<td> \n" .
            "\t \t \t \t<td><input class='$this->class' type='$this->type' name='$this->name' value='$this->value'/> <td> \n" .
            "\t \t \t</tr> \n";
        return $inputAsHtml;
    }
}