<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 06/05/2016
 * Time: 08:52
 */

namespace Store\Classes\Inputs;


use Store\Interfaces\IHtmlBuilder;

class ButtonTableInput extends ButtonInput implements IHtmlBuilder
{
    public function getAsHtml()
    {
        return "<input class='$this->class' type='$this->type' name='$this->name' value='{$this->value}'/>\n";
    }
}