<?php namespace Store\Classes\HtmlElements\Forms;

use Store\Interfaces\IHtmlBuilder;

abstract class FormBase implements IHtmlBuilder
{
    protected $action;
    protected $method;
}