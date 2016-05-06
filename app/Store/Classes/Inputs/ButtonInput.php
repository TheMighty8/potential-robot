<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 03/05/2016
 * Time: 11:07
 */

namespace Store\Classes\Inputs;


use Store\Interfaces\IHtmlBuilder;
use Store\Interfaces\IInput;

class ButtonInput extends InputBase implements IHtmlBuilder
{
    protected $class;
    protected $value;

    public function __construct($type, $name, $class, $value)
    {
        parent::__construct($type, $name);
        $this->class = $class;
        $this->value = $value;
    }
    
    public function getAsHtml()
    {
        $inputAsHtml =
            "\t \t \t<tr> \n" .
            "\t \t \t \t<td><td> \n" .
            "\t \t \t \t<td><input class='$this->class' type='$this->type' name='$this->name' value='$this->value'/><td> \n".
            "\t \t \t</tr> \n";
        return $inputAsHtml;
    }
}