<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 05/05/2016
 * Time: 10:16
 */

namespace Store\Classes\Tables;


use Store\Interfaces\IHtmlBuilder;

abstract class TableBase implements IHtmlBuilder
{
    protected $class;

    public function __construct($class)
    {
        $this->class = $class;
    }
}