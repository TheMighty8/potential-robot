<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 06/05/2016
 * Time: 08:32
 */

namespace Store\Classes\Inputs;


use Store\Interfaces\IHtmlBuilder;

class HiddenInput extends InputBase implements IHtmlBuilder
{
    private $value;

    public function __construct($value)
    {
        parent::__construct('hidden' , 'id');
        $this->value=$value;
    }

    public function getAsHtml()
    {
        $hiddenInputAsHtml = "<input type='{$this->type}' name='{$this->name}' value='{$this->value}'>";
        return $hiddenInputAsHtml;
    }
}