<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 03/05/2016
 * Time: 10:35
 */

namespace Store\Classes\Forms;


use Store\Interfaces\IForm;
use Store\Interfaces\IHtmlBuilder;

abstract class FormBase implements IHtmlBuilder, IForm
{
    protected $action;
    protected $method;
}