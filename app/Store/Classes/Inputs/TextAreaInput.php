<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 06/05/2016
 * Time: 10:19
 */

namespace Store\Classes\Inputs;


use Store\Interfaces\IHtmlBuilder;

class TextAreaInput implements IHtmlBuilder
{
    protected $name;

    public function __construct($name)
    {
        $this->name=$name;
    }
    
    public function getAsHtml()
    {
        // TODO: Implement getAsHtml() method.
    }
}